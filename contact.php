<?php  
require("bd.php");
class contact extends database {
    protected $id_nom;
    protected $nom;
    protected $prenom;
    protected $numero;
    protected $favori;

public function insert_contact($nom, $prenom,$numero, $favori){
    $sql = "INSERT INTO contacts  (nom, prenom, numero, favori) VALUES (:nom, :prenom, :numero, :favori)";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute ([
            'nom'=>$nom,
            'prenom'=>$prenom,
            'numero'=>$numero,
            'favori'=>$favori
        ]);
       }
       function supprimer($id_nom){
        $sql="DELETE FROM contacts WHERE id_nom=:id_nom";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute ([
            ':id_nom'=>$id_nom ]);
            header('location:afficher.php');
       }
       function lister_contact(){
        $sql="SELECT * FROM contacts";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
       }
       function affiche_id($id_nom){
        $sql="SELECT * FROM contacts WHERE id_nom=:id_nom";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute([
            ':id_nom'=>$id_nom ]);
        return $stmt->fetchAll();
       }
       function modifier($id_nom,$nom, $prenom,$numero, $favori){
        $sql="UPDATE contacts SET nom=:nom , prenom=:prenom , numero=:numero, favori=:favori WHERE id_nom=:id_nom";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute ([
            'nom'=>$nom,
            'prenom'=>$prenom,
            'numero'=>$numero,
            'favori'=>$favori,
            ':id_nom'=>$id_nom
        ]);

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
        if (!preg_match('/^[0-9]{1,9}$/', $numero)) {

            $erreur[] = "Veuillez entrer un numéro de téléphone valide. ";
        }
        if (!empty($erreur)) {
            print_r($erreur);
        }

  else{  $contact1=new contact ();
    $contact1->insert_contact($nom, $prenom, $numero,$favori);
    header('location:afficher.php');
    }
}
    



?>