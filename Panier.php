<?php 
include "./includes/fonctions.inc.php";
$totalP=0;
$tab=getPanier();
 
if(isset($_POST['modifierPanier'])){
  $id_taureau=$_POST['id_taureau'];
  $qteCh=$_POST['QuantiteDemander'];
  ajouterPanier($id_taureau,$qteCh,false);
}
if(isset($_POST['supprimerPanier'])){
  $id_taureau=$_POST['id_taureau'];
  supprimerPanier($id_taureau);
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
            <a class="nav-link" href="Espèces.php">Espèces</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="Taureaux.php">Taureaux</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Panier.php">Panier</a>
          </li> 
          
        </ul>
        </b>
</header>
          
  <main>
    <section>
        <h1>Panier</h1>
        <table class="table table-dark">
            <thead>
            <tr> 
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">prix</th>
                <th scope="col">race</th>
                <th scope="col">Qantite</th>
                <th scope="col">Total</th>

                <th scope="col" class="bg-transparent">Action</th>
                </tr>
            </thead>
            <tbody>

   
            
              
               <?php
               $total=0;
              
                foreach ($tab as $id =>$qte) { 
                  $taureau = getTaureauById($id);

                $total=$qte*$taureau['prix'];
                $totalP+=$total;
                ?>
               
                <tr>
                    <!-- <th scope="row"><?php echo $taureau['id'];?></th> -->
                    <td><img src="<?php echo $taureau['chemin']; ?>" height="100px" width="110px"></td>
                    <td><?php echo $taureau['nom'];?></td>
                    <td><?php echo $taureau['prix'];?>$</td>
                    <td><?php echo $taureau['race'];?></td>
                    <form method="post"> 
                    <td><input type="number" name="QuantiteDemander" value="<?php echo $qte;?>" min="1" max="<?php echo $taureau['disponibilite'];?>"></td>
                    <td><?php echo $total;?>$</td>
                    <td class="row bg-transparent">
                     

                     <input type="hidden" name="id_taureau"  value="<?php echo  "$id"; ?>">
                 <div class="col-3">
                  <div>
                    <div class="col-3">
                            <a><button type="submit"   name="modifierPanier" class="btn btn-block btn-success"><i class="bi bi-pencil-square"></i></button>
                            </a>    
                    </div>
                    <br>
                    
                        <div class="col-3">
                            <a><button type="submit" name="supprimerPanier" class="btn btn-block btn-danger"><i class="bi bi-trash"></i></button>
                            
                            </a>
                        </div>
                        
               </div>           
               </div>

                    </td>
                    </form>
                </tr>
                
               <?php } ?>
                
            </tbody>
        </table>
        <div  class="text-success col-auto text-end">
          <div>
          <button type="" class="btn btn-block btn-success"> Totale: <?php echo $totalP;?>$</button>    
          <form method="post"> <button type="submit" name="payer" class="btn btn-warning">Payer  </button> </form>
          </div>
        </div>
        <?php
        if(isset($_POST['payer'])){
          ?>
          <div  class="text-success col-auto text-center">
           <button type="" class="btn btn-block btn-success"> Commande Valider merci!!! </button>    
          </div>
          <?php

          if(isset($_SESSION['Personne'])){
            $id_User=$_SESSION['Personne']['id'];
            
            ajouterCommande($totalP,$id_User);
            viderPanier();

            
          }else{
            header("Location: ./Connexion.php");
          }
        }
        ?>
        
    </section>
</main>


</body>

</html>