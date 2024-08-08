<!DOCTYPE html>
<html lang="fr">
<?php include "./includes/fonctions.inc.php"?>


<?php include "./includes/Head_img.php"?>
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
            <a class="nav-link" href="Présentation.php">Présentation</a>
          </li><br>

          <li class="nav-item">
            <a class="nav-link" href="Boutique.php">Boutique</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Mon Compte.php">Mon Compte</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Services.php">Services</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="Inscription.php">Inscription</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Connexion.php">Connexion</a>
          </li>

          
          <a href=" Panier.php" class="btn btn-block btn-primary"><i class="bi bi-cart4"><small><?php echo countElementPanier();?></small></i></a>
          
         </li>
         </li>
          <a href="supprimerPanier.php" class="btn btn-block btn-primary">Deconnexion</a>
          
         </li>

          
        </ul>
        </b>
  </header>
                           <h1>Menu</h1>
         
        <p> .<br><br> <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br> </p>

       
          


        
</body>


</html>