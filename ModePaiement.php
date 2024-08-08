<?php
include "./includes/fonctions.inc.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

              value:'0.10'

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

</body>
</html>