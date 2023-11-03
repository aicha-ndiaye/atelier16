<?php
require("../modele/contact.php");
$obj1=new contact();
if (isset($_POST['supprimer'])) {
   $obj1->supprimer($_POST['supprimer']);
}
if (isset($_POST['modifier'])) {
    $leye = $obj1->affiche_id($_POST['modifier']);
    // var_dump($leye);
    if (isset($leye[0])) { 
      include('../view/formmodif.php');
    } 
 
}
if (isset($_POST['modifier_valeur'])) {
    $obj1->modifier($_POST['modifier'],$_POST['nom'],$_POST['prenom'], $_POST['numero'], $_POST['favori']);
   header('location: afficher.php');
}
if (isset($_POST['ajouter'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $numero =intval($_POST['numero']);
  $favori=$_POST['favori'];
  $erreur = [];
  if (!preg_match('/^[A-Za-z]{2,}$/', $nom)) {
    
      $erreur[] = "Veuillez entrer un nom valide. ";
  }
  if (!preg_match('/^[A-Za-z]{2,}$/', $prenom)) {
 
      $erreur[] = "Veuillez entrer un prenom valide. ";
  }
  if (!preg_match('/^[0-9]{1,9}$/', $numero)) {

      $erreur[] = "Veuillez entrer un numéro de téléphone valide. ";
  }
  if (!empty($erreur)) {
      print_r($erreur);
  }

else{  $contact1=new contact ();
$contact1->insert_contact($nom, $prenom, $numero,$favori);
header('location:../view/afficher.php');
}
}



?>