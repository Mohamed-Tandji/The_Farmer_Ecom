<?php include './includes/fonctions.inc.php';
$taureaux=getAllTaureaux();
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
           
            <a class="nav-link" href="MenuAdmin.php">Menu</a>
          </li><br>
          
          <li class="nav-item">
            <a class="nav-link" href="GestionGenisses.php">GestionGenisses</a>
          </li><br>
          
          <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="GestionTaureaux.php">Gestion des Taureau</a>
          </li>
          <li class="nav-item">
          <a class="nav-link  " href="GestionCommande.php">Gestion Commande</a>
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
        <h1 class="text-center">Gestion Taureaux</h1>
        <a href="ajouterTaureau.php" class="btn btn-block btn-primary">Ajouter Taureau</a>
        <table class="table table-dark">
            <thead>
                <tr> 
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Nom_pere</th>
                <th scope="col">Nom_mere</th>
                <th scope="col">Prix</th>
                <th scope="col">Race</th>
               
                <th scope="col" class="bg-transparent">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php 
               $i=1;
               foreach ($taureaux as $taureau) { ?>
               
                <tr>
                    <th scope="row"><?php echo $i++;?></th>
                    <td><img src="<?php echo $taureau['chemin']; ?>" height="100px" width="110px"></td>
                    <td><?php echo $taureau['nom'];?></td>
                    <td><?php echo $taureau['nom_pere'];?></td>
                    <td><?php echo $taureau['nom_mere'];?></td>
                    <td><?php echo $taureau['prix'];?></td>
                    <td><?php echo $taureau['race'];?></td>
                    

                    <td class="row bg-transparent">
                    <div class="col-3">
                            <a href="modifierTaureau.php?id=<?php echo $taureau['id'];?>" class="btn btn-block btn-success"><i class="bi bi-pencil-square"></i>
                            </a>    
                    </div>
                        <div class="col-3 ">
                            <a href="supprimerTaureau.php?id=<?php echo $taureau['id'];?>" class="btn btn-block btn-danger"><i class="bi bi-trash"></i>
                            </a>
                        </div>
                        <div class="col-3 ">
                            <a href="vuePanier.php?id=<?php echo $taureau['id'];?>" class="btn btn-block btn-danger">View
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