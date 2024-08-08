<?php
include './includes/fonctions.inc.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    supprimerCommande($id);
}

?>