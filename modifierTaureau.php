<?php

include './includes/fonctions.inc.php';
if (isset($_GET['id'])) {
   $id = $_GET['id'];
    $taureau = getTaureauById($id);
    if(isset($_POST['modifier'])){
        $nom = $_POST['nom'];
        $nom_pere = $_POST['nom_pere'];
        $nom_mere = $_POST['nom_mere'];
        $prix = $_POST['prix'];
        $race = $_POST['race'];
        $resistance = $_POST['resistance'];
        $race_type = $_POST['race_type'];
        $disponibilite = $_POST['disponibilite'];
    
        if (empty($nom) || empty($nom_pere) || empty($nom_mere) || empty($prix) ||empty($race) || empty($resistance) || empty($race_type) || empty($disponibilite) ) {
            echo 'Remplir tous les champs svp !';
         }else{
     
             if(isset($_FILES["image"]) && $_FILES["image"]["error"] ===  UPLOAD_ERR_OK){
                 
     
                 $image_name=$_FILES["image"]["name"];
                 $image_tmp=$_FILES["image"]["tmp_name"];
                 $image_destination="images_T/".basename($image_name);//chemin destination
     
                 //verification
                 $image_type=strtolower(pathinfo($image_destination,PATHINFO_EXTENSION));
                 if(!in_array($image_type,array("jpg","jpeg","png","gif"))){
                     echo "Seules les images sont autorisees";
                     exit();
                    }
                 //deplacement de l'image
                 if ( move_uploaded_file($image_tmp,$image_destination)){
     
                    UpdateTaureau($id,$nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite ,$image_destination);

                }
     
            }else{
                UpdateTaureau($id,$nom ,$nom_pere ,$nom_mere ,$prix ,$race ,$resistance ,$race_type ,$disponibilite ,);

            }
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
            <a class="nav-link active" aria-current="page" href="Menu.php">Menu</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="Panier.php">Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajouterTaureau.php">ajouterTaureau</a>
          </li><br>

          <li class="nav-item">
          <a class="nav-link" href="GestionTaureaux.php">GestionTaureau</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="modifierTaureau.php">modifierTaureau</a>
          </li>
          
        </ul>
        </b>
  </header>
          
  <main>
    <section>
    <h1>Modifier les Infos du Taureau</h1>
    <form method="post" enctype="multipart/form-data">
   
    <div class="mb-3">
        <img src= "<?php echo $taureau['chemin']; ?>" height="100px" width="110px">
    </div>
        <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" value="<?php echo $taureau['nom']; ?> " name="nom" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="nom_pere" class="form-label">Nom du pere</label>
                    <input type="text"  value="<?php echo $taureau['nom_pere']; ?> " name="nom_pere" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nom_mere" class="form-label">Nom de la mere</label>
                    <input type="text"  value="<?php echo $taureau['nom_mere']; ?> "  name="nom_mere" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number"  value=<?php echo $taureau['prix']; ?>   name="prix" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="race" class="form-label">Race</label>
                    <input type="text"  value="<?php echo $taureau['race']; ?> " name="race" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="resistance" class="form-label">Résistance</label>
                    <input type="number"  value=<?php echo $taureau['resistance']; ?>   name="resistance" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="race_type" class="form-label">Race_type</label>
                    <input type="text"   value="<?php echo $taureau['race_type']; ?> "  name="race_type" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="disponibilite" class="form-label">Disponibilite</label>
                    <input type="number" value=<?php echo $taureau['disponibilite']; ?>  name="disponibilite" class="form-control" >
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" name='modifier' type="submit">Modifier Taureau</button>
                </div>
               
        </form>

    </section>
</main>

</body>

</html>