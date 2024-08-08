<?php
//session_start();

//creation de cookie
//setcookie("email","Mahamadou",(time()+60*60*24*10))

//destruction de cookie

//unset($_COOKIE['email']);
include "./includes/fonctions.inc.php";

$dbhost ="localhost";
$dbuser = "root";
$dbpassword ="";
$dbname ="Ferme";
$port = 3306;


if (isset($_POST['connecter'])) {
  $email = $_POST['email'];
  $mot_de_passe = $_POST['password'];

  if (!empty($email) && !empty($mot_de_passe)) { 
  // 0. Connexion a la bd
  Connexion($email,$mot_de_passe);
}

}


?>


<!DOCTYPE html>
<html lang="fr">

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
            <a class="nav-link" href="Inscription.php">Inscription</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Connexion.php">Connexion</a>
          </li>
          
        </ul>
        </b>
  </header>
                    
    
        <h1>Nous sommes heureux de vous revoir </h1>
    <section>
   
    <div class="card">
        <div class="card-body">
        <div class="container">
           <form method="post">
            <f>
                <div class="mb-3 ">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email"  name="email" class="form-control"  placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
                    <input type="password"  name="password" class="form-control"  placeholder="mot de passe">
            </div>
                
               
                <button type="submit"  name="connecter" class="btn btn-outline-primary">Connexion</button>
            </f>
            </form>
       </div> 
        </div>
    </div>
  
    </section>
</body>

</html>