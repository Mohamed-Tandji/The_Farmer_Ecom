<?php
include './includes/fonctions.inc.php';

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="Ferme";
$port=3306;

if (isset($_POST['envoyer'])){
        // recup des donnees du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['password'];
$c_mot_de_passe = $_POST['c-password'];

 
        
        
if (!empty($nom)&& !empty($prenom)&& !empty($email)&&
    !empty($mot_de_passe)&& !empty($c_mot_de_passe) ){
        if($mot_de_passe === $c_mot_de_passe){
            //  connexion a la base de donnee
          $conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname,$port);
      if(!$conn){
          die("Echec de la connexion a la base de donnee".mysqli_connect_error());
        }
           //Verifie si l'utilisateur existe
           $sqlverify= 'SELECT  * from personne where email= ?';
     
 
           $result = $conn->prepare($sqlverify);
           $result->bind_param('s',$email);
           $result->execute();
           $resultat = $result->get_result();
           $resultat = $resultat->fetch_assoc();
         
       if(isset($resultat) && count($resultat) >= 1){
           header('Location: connexion.php');
           
           mysqli_close($conn);
         }
     //verification terminer./.
     inscription($nom,$prenom,$email,$mot_de_passe);
 

            
  
        }
 }
}

?>
<!DOCTYPE html>
<html lang="fr">

<?php include "./includes/Head_no.php"?>


<body>

  <header>
         <b>
         <br> 
        <ul class="nav nav-underline">
        <div class="logo">
          <img src="Css/images/logo.jpg" width="40px" heigth="auto" alt=" Bienvenu logo">
        </div>
            
            
        <li class="nav-item">
            <a class="nav-link" href="Menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Présentation.php">Présentation</a>
          </li><br>

          <li class="nav-item">
            <a class="nav-link" href="Boutique.php">Boutique</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Mon Compte.php">Mon Compte</a>
          </li>

          <li class="nav-item">
            <a class="nav-link  active" aria-current="page" href="Inscription.php">Inscription</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Connexion.php">Connexion</a>
          </li>
          
        </ul>
        </b>
  </header>
  <h1>Inscription</h1>
                   
        <div class="card">
            <div class="card-body">
        <section>
                           
        <div class="container">
           <form method="post">
           <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" name="nom"  class="form-control"  placeholder="nom">
            </div>
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prenom</label>
                    <input type="text"  name="prenom" class="form-control"  placeholder="prenom">
            </div>
            
           <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control"  placeholder="nom@exemple.com">
            </div>
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Numero de Telephone</label>
                    <input type="text"  name="numero" class="form-control" placeholder=" votre nuumero de Telephone">
            </div>
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control"  placeholder="mot de passe">
            </div>
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> confirmer le Mot de passe</label>
                    <input type="password"  name="c-password" class="form-control"  placeholder="mot de passe">
            </div>
          
            
            <div >
                <br>
                <button type="submit" name="envoyer" class="btn btn-outline-primary">Inscrire</button>

            </div>
        </form>
       </div>
    </section>

        </div>
    </div>
        
</body>

</html>


