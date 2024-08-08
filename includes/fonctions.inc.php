<?php
////Last version

session_start();

//unset($_SESSION['panier']);
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=array();
}
function viderPanier(){
    unset($_SESSION['panier']);

}

function connexionDB(){
    $dbhost ="localhost";
    $dbuser = "root";
    $dbpassword ="";
    $dbname ="Ferme";
    $port = 3306;

    $connexion = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname,$port);
    if(!$connexion){
        die("Echec de la connexion a la base de donnee".mysqli_connect_error());
    }
    return $connexion;
}

function Connexion($email,$mot_de_passe){
    $conn = connexionDB();
    if(!$conn){
        die("Echec de la connexion a la base de donnee".mysqli_connect_error());
    }
    $email = mysqli_real_escape_string($conn,$email);
    $mot_de_passe = mysqli_real_escape_string($conn,$mot_de_passe);
  
    //$sql = 'SELECT * FROM personne where email ="'.$email.'" and mot_de_passe ="'.$mot_de_passe.'"';
    //  $data_password= 'SELECT  mot_de_passe from personne where email= ?';
    //  $id='SELECT  id from personne where email= ?';
  
      $sql='SELECT  id,mot_de_passe from personne where email= ?';
    // $result = $conn->prepare($data_password,$id);
    $result = $conn->prepare($sql);
    $result->bind_param('s',$email);
    $result->execute();
    $resultat = $result->get_result();
    $resultat = $resultat->fetch_assoc();
    
    if(isset($resultat) && count($resultat) >= 1){
      //$_SESSION['email']=$email;
      if(password_verify($mot_de_passe,$resultat['mot_de_passe'])){
          unset($resultat['mot_de_passe']);
          $_SESSION['Personne']=$resultat;
        // L' envoyer vers la page d'aceuille
        $id=$resultat['id'];
        VerifAdmin($id);
        mysqli_close($conn);
      }
      else{
        echo"un password maquant";
        header('Location: connexion.php');
        // L'envoyer le code d' erreur et l' afficher sur ma page de conne};
      }
  
    }
    }
  
  

function ajouterPanier($id,$quantiteDemander,$IsTaureaux=true){
    $_SESSION['panier'][$id]=$quantiteDemander;
if($IsTaureaux){
    header('Location: ./Taureaux.php');
  
}else{
    header('Location: ./Panier.php');

}
}

function supprimerPanier($id){
    unset( $_SESSION['panier'][$id]);
    header('Location: ./Panier.php');

}

function countElementPanier(){
    $taillePanier = count($_SESSION['panier']);
    return $taillePanier;
}

function getPanier(){
    return $_SESSION['panier'];
}

function  getDateA(){
    return $date_commande=date("Y-M-D h:m:s");

}

function ajouterCommande($totalP,$id){
    $conn = connexionDB();

    $sql ="INSERT INTO Commande (prix_total, date_commande ,id_User) Values(?,?,?) ";
    $stmt = $conn->prepare($sql);
    $date_commande=getDateA();
    $stmt->bind_param('dsi',$totalP,$date_commande ,$id);
    $resultat = $stmt->execute(); 
    if($resultat){
        // // avoir l'id  de la derniere insertion
         $id_commande=$conn->insert_id;
         $monPanier=getPanier();
        foreach($monPanier as $id_Taureaux =>$quantite){
           ajouterCommande_produit($id_commande,$id_Taureaux,$quantite);

        };
       
    }
   

}

function ajouterCommande_produit($id_commande,$id_Taureaux,$quantite){
    $conn = connexionDB();

    $sql ="INSERT INTO Commande_produit (id_commande,id_Taureaux ,quantite) Values(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iii',$id_commande,$id_Taureaux,$quantite);
    $resultat = $stmt->execute();
    
   
// if ($resultat) {
//         header('Location: VuePanier.php');
//     }else{
//         header('Location: success.php ');

//     }
}

function getAllCommandes(){
    $Commandes = array();
    $conn =connexionDB();
    $sql="SELECT  * from Commande";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $resultats=$stmt->get_result();

    foreach($resultats as $commande){
        $Commandes[]=$commande;
    }
    return $Commandes;
      
}
function supprimerCommande($id){
    $conn = connexionDB();
    $sql ='DELETE from commande where id_commande = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $resultat = $stmt->execute();
    $stmt->close();
    $conn->close();

    if ($resultat) {
        header('Location: GestionCommande.php');
    }
    else{
        echo 'Une erreur lors de la suppression';
    }
}

function UpdateCommande($id_commande,$id_Taureaux,$quantite){

    $conn =connexionDB();
    $sql = 'UPDATE commande set id_commande =?, id_Taureaux =?, quantite =?  where id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iii',$id_commande,$id_Taureaux,$quantite);
    $resultat = $stmt->execute();
    header('Location: ./GestionCommandes.php');

  

}







function ajouterTaureau($nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite ){
    $conn = connexionDB();

    $sql ='INSERT INTO Taureaux(nom ,nom_pere ,nom_mere ,prix ,race ,resistance ,race_type ,disponibilite ) Values(?,?,?,?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    // string s, int i, float | double d, bool b
    $stmt->bind_param('sssdsisi',$nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite);
    $resultat = $stmt->execute();
    $stmt->close();
    $conn->close();

    
   
}
function EnregistrerTaureau($nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite,$chemin){

    $conn= connexionDB();
    $sql="INSERT into Taureaux(nom ,nom_pere ,nom_mere ,prix ,race ,resistance ,race_type ,disponibilite) Values(?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("sssisisi",$nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite);
   $IsSave= $stmt->execute();
   if($IsSave){
    $id_Taureaux=$conn->insert_id;
    enregistrerImage($chemin,$id_Taureaux);

   }

}
function enregistrerImage($chemin,$id_Taureaux){

    $conn= connexionDB();
    $sql="INSERT into Image_Taureaux(chemin,id_Taureaux) Values(?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("si",$chemin,$id_Taureaux);
   $IsSave= $stmt->execute();
   if($IsSave){
    header('Location: ./GestionTaureaux.php');
   }
}

function EnregistrerGenisse($nom ,$nom_pere ,$nom_mere ,$prix ,$race,$capacite_lait ,$resistance ,$race_type ,$disponibilite,$chemin){

    $conn= connexionDB();
    $sql="INSERT into Genisses(nom ,nom_pere ,nom_mere ,prix ,race ,capacite_lait,resistance ,race_type ,disponibilite) Values(?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("sssdsdisi",$nom ,$nom_pere ,$nom_mere ,$prix ,$race,$capacite_lait ,$resistance ,$race_type ,$disponibilite);
   $IsSave= $stmt->execute();
   if($IsSave){
    $id_Taureaux=$conn->insert_id;
    enregistrerImage_Genisse($chemin,$id);

   }

}
function enregistrerImage_Genisse($chemin,$id){

    $conn= connexionDB();
    $sql="INSERT into Image_Genisses (chemin,id_Genisses) Values(?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("si",$chemin,$id);
   $IsSave= $stmt->execute();
   if($IsSave){
header('Location: ./GestionGenisses.php');
   }
}


function getAllGenisses(){
    $Genisses = array();
    $conn =connexionDB();
    $sql="SELECT  G.id, G.nom, G.nom_pere,  G.nom_mere, G.capacite_lait, G.prix, G.race, G.resistance, G.disponibilite ,I.chemin from Genisses G
    join Image_Genisses I on I.id_Genisses=G.id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $resultats=$stmt->get_result();

    foreach($resultats as $taureau){
        $Genisses[]=$genisse;
    }
    return $Genisses;
   
}




function UpdateTaureau($id,$nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite ,$image_destination=""){

    $conn =connexionDB();
    $sql = 'UPDATE Taureaux set nom =?, nom_pere =?, nom_mere =?, prix =?,race =?, resistance =?, race_type=?, disponibilite =?  where id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssdsisii',$nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite,$id,);
    $resultat = $stmt->execute();
    if ($resultat) {
        if(!empty($image_destination)){
            UpdateImage_Taureau($id,$image_destination);
        }else{
            header('Location: ./GestionTaureaux.php');

        }
    }
  

}
function UpdateImage_Taureau($id_Taureaux,$image_destination){

    $conn =connexionDB();
    $sql=" UPDATE  Image_Taureaux set chemin =?  where id_Taureaux = ? ";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('si',$image_destination,$id_Taureaux,);
    $Est=$stmt->execute();
    if($Est){
        header('Location: ./GestionTaureaux.php');

    }

}

function getAllTaureaux(){
    $Taureaux = array();
    $conn =connexionDB();
    $sql="SELECT  T.id,T.nom,T.nom_pere, T.nom_mere, T.prix,T.race,T.resistance,T.disponibilite ,I.chemin
     from Taureaux T
    join Image_Taureaux I on I.id_Taureaux=T.id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $resultats=$stmt->get_result();

    foreach($resultats as $taureau){
        $Taureaux[]=$taureau;
    }
    return $Taureaux;
   

}

function supprimerTaureau($id){
    $conn = connexionDB();
    $sql ='DELETE from Taureaux where id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $resultat = $stmt->execute();
    $stmt->close();
    $conn->close();

    if ($resultat) {
        header('Location: GestionTaureaux.php');
    }
    else{
        echo 'Une erreur lors de la suppression';
    }
}

function getCommandeTaureauById($id){

    $Commandes = array();
    $conn =connexionDB();
    $sql="SELECT  * from Commande_produit where id_commande=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $resultats=$stmt->get_result();

    foreach($resultats as $commande){
        $Commandes[]=$commande;
    }
    return $Commandes;
}

function getTaureauById($id){
    $conn = connexionDB();

    $sql = "SELECT  T.id,T.nom,T.nom_pere, T.nom_mere, T.prix,T.race, T.resistance ,T.race_type ,T.disponibilite,I.chemin from Taureaux T
    join Image_Taureaux I on I.id_Taureaux=T.id  where T.id=?" ;

    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $resultats = $stmt->get_result();

    $taureau = $resultats->fetch_assoc();

    return $taureau;
}



function inscription($nom,$prenom,$email,$mot_de_passe){

    $conn =connexionDB();
    $nom = mysqli_real_escape_string($conn,$nom);
    $prenom = mysqli_real_escape_string($conn,$prenom);
    $email = mysqli_real_escape_string($conn,$email);
    $mot_de_passe = mysqli_real_escape_string($conn,$mot_de_passe);

    $mot_de_passe = password_hash($mot_de_passe,PASSWORD_DEFAULT);

       $sql = "INSERT INTO personne(nom,prenom,email,mot_de_passe) values(?,?,?,?)  ";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param("ssss",$nom,$prenom,$email,$mot_de_passe);
       $result = $stmt->execute();
       if($result){

        //AjoutRole($email);

        header('Location: ./GestionUtilisateur.php');

     }
       else{ echo "Une erreur est survenue";}
}

function getAllUsers(){
    $Users=array();
    $conn =connexionDB();
   
     $sql="SELECT  U.id,U.nom,U.prenom,U.email,R.titre from Personne U 
     join Personne_role R_P on R_P.id_personne = U.id
     join Role R on R_P.id_role = R.id  ";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $resultats=$stmt->get_result();
    foreach($resultats as $user){
        $Users[]=$user;
    }
    return $Users;
}

function AjoutRole($email){
 $conn= connexionDB();
 $sql="SELECT * from Personne where email=?";
 $stmt=$conn->prepare($sql);
 $stmt->bind_param("s",$email);
$IsSave= $stmt->execute();
echo "$IsSave";

// if($IsSave){
//     $id=$IsSave.id;
//     echo "$id";
// }
}

function VerifAdmin($id){
    $conn=connexionDB();
    // $sql="SELECT  U.id,R.titre from Personne U
    // join Role  on R.id_personne = U.id R where id =? ";
    $sql= 'SELECT U.id,R_P.id_role from Personne U join Personne_role R_P on R_P.id_personne=U.id where id=?';
    $stmt= $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $resultats=$stmt->get_result();
    $User= $resultats->fetch_assoc();
    if(isset($User['id_role'])&& $User['id_role']===2){
    header("Location: ./MenuAdmin.php");
    }else{
        header("Location: ./Menu.php");

    }

}

function supprimerUser($id){
    $conn = connexionDB();
    $sql ='DELETE from Personne where id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $resultat = $stmt->execute();
    $stmt->close();
    $conn->close();

    if ($resultat) {
        header('Location: ./GestionUtilisateur.php');
    }
    else{
        echo 'Une erreur lors de la suppression';
    }
}

function getUserById($id){
    $conn =connexionDB();
    
    $sql="SELECT * from Personne where id= ? ";

    $stmt= $conn->prepare($sql);
    $stmt->bind_param('i',$id);

    $stmt->execute();
    $resultats=$stmt->get_result();
    $User= $resultats->fetch_assoc();
    return $User;
}

function UpdateForUser($nom,$prenom,$email,$mot_de_passe,$id){
    $conn= connexionDB();
    $sql='UPDATE Personne set nom=?,prenom=?,email=?,mot_de_passe=? where id=? ';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi",$nom,$prenom,$email,$mot_de_passe,$id);
    $result = $stmt->execute();
    if($result){
        header('Location: ./Mon Compte.php');
    }
       else{ echo "Une erreur est survenue";}
}
function UpdateForAdmin($id,$nom,$prenom,$email,$titre){
    $conn= connexionDB();
    $sql='UPDATE Personne set nom= ?,prenom = ?,email= ? where  id= ? ';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi",$nom,$prenom,$email,$id);
    $result = $stmt->execute();
    if($result){
     UpdateForAdminRole($titre,$id); }
    else{ echo "Une erreur est survenue";}
}

function UpdateForAdminRole($titre,$id){
 $conn= connexionDB();
 $sql="UPDATE  Personne_role set id_role =?   where id_personne= ?";
 $stmt=$conn->prepare($sql);
 $stmt->bind_param("ii",$titre,$id);
$IsSave= $stmt->execute();
if($IsSave){
   header('Location: ./GestionUtilisateur.php');}  
}




?>