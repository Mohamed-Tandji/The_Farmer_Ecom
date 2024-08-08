




<?php 
include "./includes/fonctions.inc.php";
$taureaux = getAllTaureaux();
if(isset($_POST['ajoutPanier'])){
  $id=$_POST['id_taureau'];
  ajouterPanier($id,1);
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<link rel="stylesheet" type="text/css" href="Css\ViergessCss.css?v=1.1">
        <link rel="icon" type="image/jpg" href="Css/images/logo.jpg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>

<header>
         <b>
         <br> 
        <ul class="nav nav-underline">
        <div class="logo">
          <img src="Css/images/logo.jpg" width="40px" heigth="auto" alt=" Bienvenu logo">
        </div>
       
          

        <li class="nav-item">
            <a class="nav-link" href="Espèces.php">Espèces</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="Taureaux.php">Taureaux</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Génisses.php">Génisses</a>
          </li>
          </li>
          <a href="Panier.php" class="btn btn-block btn-primary"><i class="bi bi-cart4"><small><?php echo countElementPanier();?></small></i></a>
          
         </li>

          
          
        </ul>
        </b>
</header>

<main>
<section >   

<p>
    <h1>Bienvenue Sur notre Site</h1>
</p>
  <div class="row">
    <?php foreach ($taureaux as $key =>$taureau) { ?>

    <div class="col-3">
    <form method="post">
      <input type="hidden" name="id_taureau" value="<?php echo $taureau['id']?>">

        <div class="card" style="width: 18rem;">
              
              <a href=<?php echo "Taureaux.php?id=".$taureau['id'];?>>
                  <img  src="<?php  echo $taureau['chemin']; ?>" height="200px" width="150px" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $taureau['nom']?></h5>
                    <p class="card-text"><?php echo "Fils de : ".$taureau['nom_pere']?>  et  de <?php echo $taureau['nom_mere']?></p>
                    <h5 class="card-title"><?php echo "Prix:".$taureau['prix']."$"?></h5>

                    <p class="card-text"><?php echo "Race:".$taureau['race']."   "."Resistance:"?>    <?php echo $taureau['resistance']."%"?> </p>

                   <a> <button href="./Panier.php"class="btn btn-primary" type="submit" name="ajoutPanier">Ajouter au Panier</button></a> 
                   <a>   <button href="./index.php" class="btn btn-primary" type="submit">Acheter</button></a> 
                  </div>

                  <!-- Avec la fonction panierVue -->

                  <!-- <a> <button href="VuePanier.php?id=<?php echo $taureau['id'];?>"class="btn btn-primary" type="submit" name="ajoutPanier">Ajouter au Panier</button></a> 
                   <a>   <button href="Mode_payement.php?id=<?php echo $taureau['id'];?>" class="btn btn-primary" type="submit">Acheter</button></a> 
                  </div> -->

        </div>
        </form> 

    </div> 
    <?php } ;?>

  </div>

  


</section>
</main>










</body>
</html>