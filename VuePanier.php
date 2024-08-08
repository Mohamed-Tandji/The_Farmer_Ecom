<?php

include './includes/fonctions.inc.php';
if (isset($_GET['id'])) {
   $id = $_GET['id'];
    $taureau = getTaureauById($id);
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

</header>
          
        

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>


<div class="row">
<div class="col-3">

<div class="card" style="width: 25rem;">
  <img src="<?php echo $taureau['chemin'] ;?>" height="400px" width="auto" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Prix:  <?php echo $taureau['prix'] ;?> $</h5>   

    

<div id="paypal-payment-button"></div>

<script src="https://www.paypal.com/sdk/js?client-id=Ad4kXWPteFtouSghhk1v3Jw6emY6OFQEnLRbgjEbW657GinvKc0vWC1WNFAsC2aR3yyIR_2AMu1iq2oZ"></script>

<script >

paypal.Buttons({

style : {

    color: 'blue'

},

createOrder: function(data, actions) {



    return actions.order.create({

        purchase_units:[{

          amount: {

              value:'<?php echo $taureau['prix'] ;?>'

          }

        }]

    })

},

onApprove: function(data, actions) {

   

    return actions.order.capture().then(function(details) {

        console.log(details);

      window.location.replace("success.html");

    })

}

}).render('#paypal-payment-button');</script>
  </div>
</div>
</div>
 </div>
   



  </body>
</html>
