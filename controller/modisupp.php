<?php
require("../modele/contact.php");
$obj1=new contact();
if (isset($_POST['supprimer'])) {
   $obj1->supprimer($_POST['supprimer']);
}
if (isset($_POST['modifier'])) {
    $tab = $obj1->affiche_id($_POST['modifier']);
    // var_dump($leye);
    if (isset($tab[0])) { 
      include('../view/formmodif.php');
    }
    
 
}
if (isset($_POST['modifier_valeur'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $numero =intval($_POST['numero']);
  $favori=$_POST['favori'];
   
    if (!preg_match('/^[A-Za-z]{2,}$/', $nom)) {
    
      $erreur[] = "Veuillez entrer un nom valide. ";
  }
  if (!preg_match('/^[A-Za-z]{2,}$/', $prenom)) {
 
    $erreur[] = "Veuillez entrer un prenom valide. ";
}
if (!preg_match('/^(77|78|76|75|70)[0-9]{7,}$/', $numero)) {
  $erreur[] = "Veuillez entrer un numéro de téléphone valide. ";
}
if (!empty($erreur)) {
  print_r($erreur);
}
  else{ header('location: ../view/afficher.php');
    $obj1->modifier($_POST['modifier'],$_POST['nom'],$_POST['prenom'], $_POST['numero'], $_POST['favori']);

}
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
  if (!preg_match('/^(77|78|76|75|70)[0-9]{7,}$/', $numero)) {
    $erreur[] = "Veuillez entrer un numéro de téléphone valide. ";
}

  if (!empty($erreur)) {
      print_r($erreur);
  }

else{  $contact1=new contact ();
   $tab= $contact1->verification_numero($numero);
   if(count($tab)==0){
    $contact1->insert_contact($nom, $prenom, $numero,$favori);
    header('location:../view/afficher.php');
   }else{
    echo "numero existe deja";
   }

}
}

?>