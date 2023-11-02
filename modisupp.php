<?php
require("contact.php");
$obj1=new contact();
if (isset($_POST['supprimer'])) {
   $obj1->supprimer($_POST['supprimer']);
}
if (isset($_POST['modifier'])) {
    $leye = $obj1->affiche_id($_POST['modifier']);
    // var_dump($leye);
    if (isset($leye[0])) { 
      include('formmodif.php');
    } 
 
}
if (isset($_POST['modifier_valeur'])) {
    $obj1->modifier($_POST['modifier'],$_POST['nom'],$_POST['prenom'], $_POST['numero'], $_POST['favori']);
   header('location: afficher.php');
}



?>