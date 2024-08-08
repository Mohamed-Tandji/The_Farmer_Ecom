<?php 
include './includes/fonctions.inc.php';

$Users=getAllUsers();

?>
<!DOCTYPE html>
<html lang="fr">

<?php include "./includes/Head_no.php";?>

<body>

<header>
         <b>
         <br> 
        <ul class="nav nav-underline">
        <div class="logo">
          <img src="Css/images/logo.jpg" width="40px" heigth="auto" alt=" Bienvenu logo">
        </div>
            
            
        <li class="nav-item">
           
            <a class="nav-link" href="MenuAdmin.php">Menu</a>
          </li><br>
         
          <li class="nav-item">
            <a class="nav-link" href="GestionGenisses.php">GestionGenisses</a>
          </li><br>
          
          <li class="nav-item">
          <a class="nav-link" href="GestionTaureaux.php">Gestion des Taureau</a>
          </li>
          <li class="nav-item">
          <a class="nav-link  " href="GestionCommande.php">Gestion Commande</a>
          </li>
       
          <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="GestionUtilisateur.php">Gestion des Utilisateurs</a>
          </li>
         
        </ul>
        </b>
  </header>
          

<main>
    <section>
        <h1 class="text-center">Gestion Utilisateurs</h1>
        <a href="ajouterUtilisateur.php" class="btn btn-block btn-primary">Ajouter un Utilisateur</a>
        <table class="table table-dark">
            <thead>
                <tr> 
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
               
               
                <th scope="col" class="bg-transparent">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php 
               $i=1;
               foreach ($Users as $user) { ?>
               
                <tr>
                    <th scope="row"><?php echo $i++;?></th>
                    <td><?php echo $user['titre'];?></td>
                    <td><?php echo $user['nom'];?></td>
                    <td><?php echo $user['prenom'];?></td>
                    <td><?php echo $user['email'];?></td>
                    

                    <td class="row bg-transparent">
                    <div class="col-3">
                            <a href="modifierUtilisateur.php?id=<?php echo $user['id'];?>" class="btn btn-block btn-success"><i class="bi bi-pencil-square"></i>
                            </a>    
                    </div>
                        <div class="col-3 ">
                            <a href="supprimerUtilisateur.php?id=<?php echo $user['id'];?>" class="btn btn-block btn-danger"><i class="bi bi-trash"></i>
                            </a>
                        </div>
                        
                    </td>
                </tr>
                
               <?php } ?>
                
            </tbody>
        </table>
    </section>
</main>
</body>

</html>