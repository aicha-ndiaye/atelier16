<?php   
require("../modele/contact.php");
$obj1=new contact();
$abib=$obj1->lister_contact();



?>
<!DOCTYPE html>
<html>
<style>
table {
  width: 70%; 
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}
th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}
</style>
<body>

<h2>Liste des contacts ajoutés</h2>

<table>
   
  <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Numéro</th>
    <th>favori</th>
    <th>Actions</th> 
  </tr>
  <?php foreach ($abib as $diouf):?>
  <tr>
    <td><?=$diouf['nom']; ?></td>
    <td><?=$diouf['prenom']; ?></td>
    <td><?=$diouf['numero']; ?></td>
    <td><?=$diouf['favori']; ?></td>
    <td>
     <form action="../controller/modisupp.php" method ="post">
     <button name="modifier" value="<?=$diouf['id_nom']; ?>">Modifier</button>
      <button name="supprimer" value="<?=$diouf['id_nom']; ?>">Supprimer</button>
     </form>
    </td>
  </tr>
  <?php endforeach;?>

</table>

</body>
</html>
