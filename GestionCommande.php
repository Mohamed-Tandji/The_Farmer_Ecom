<?php
 
///gestion commandes

 include './includes/fonctions.inc.php';
$Commandes=getAllCommandes();
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
           
            <a class="nav-link " href="MenuAdmin.php">Menu</a>
          </li><br>
          
          <li class="nav-item">
            <a class="nav-link" href="GestionGenisses.php">GestionGenisses</a>
          </li><br>
          
          <li class="nav-item">
          <a class="nav-link " href="GestionTaureaux.php">Gestion des Taureaux</a>
          </li>
          <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="GestionCommande.php">Gestion des Commandes</a>
          </li>
       
          <li class="nav-item">
          <a class="nav-link" href="GestionUtilisateur.php">Gestion des Utilisateurs</a>
          </li>
          </li>
          <a href="Panier.php" class="btn btn-block btn-primary"><i class="bi bi-cart4"><small><?php echo countElementPanier();?></small></i></a>
          
         </li>
         
        </ul>
        </b>
  </header>
          

<main>
    <section>
        <h1 class="text-center">Gestion Commandes </h1>
       
        <table class="table table-dark">
            <thead>
                <tr> 
                <th scope="col">#</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Date de Commande</th>
                <th scope="col">Total</th>
                

               
               
                
                </tr>
            </thead>
            <tbody>
               <?php 
               $i=1;
               foreach ($Commandes as $Commande) {
                $id_user= $Commande['id_User'];
               $user=getUserById($id_user)
               ?>
                <tr>
                    <th scope="row"><?php echo $i++ ;?></th>
                    <td><?php echo $user['Prenom'];?></td>
                    <td><?php echo $Commande['date_commande'];?></td>
                    
                    <td><?php echo $Commande['prix_total'];?></td>
                    

                    <td class="row bg-transparent">
                    <div class="col-3">
                            <a href="modifierTaureau.php?id=<?php echo $Commande['id_commande'];?>" class="btn btn-block btn-success"><i class="bi bi-pencil-square"></i>
                            </a>    
                    </div>
                        <div class="col-3 ">
                            <a href="supprimerCommande.php?id=<?php echo $Commande['id_commande'];?>" class="btn btn-block btn-danger"><i class="bi bi-trash"></i>
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