<?php
include './includes/fonctions.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
     $User = getUserById($id);
     if (isset($_POST['modifier'])){
        // recup des donnees du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $titre= $_POST['titre'];
     
    
     UpdateForAdmin($id,$nom,$prenom,$email,$titre) ;

            
  
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
  <h1>Modifier L'Utilisateur</h1>
                   
        <div class="card">
            <div class="card-body">
        <section>
                           
        <div class="container">
           <form method="post">
           <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" name="nom"  class="form-control" value="<?php echo $User['nom']; ?>" >
            </div>
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prenom</label>
                    <input type="text"  name="prenom" class="form-control" value="<?php echo $User['prenom'] ;?>"  >
            </div>
            
           <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $User['email'] ?>"  >
            </div>
            
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Titre de l'Utilisateur</label>
                    <input type="number" name="titre"   class="form-control"  placeholder="User(1)/Admin(2)">
            </div>
            <div >
                <br>
                <button type="submit" name="modifier" class="btn btn-outline-primary">Modifier</button>

            </div>
        </form>
       </div>
    </section>

        </div>
    </div>
        
</body>

</html>


