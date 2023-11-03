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
            header('location:../view/afficher.php');
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
       function verification_numero($numero){
        $sql="SELECT * FROM contacts WHERE numero=:numero";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindParam(':numero', $numero);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }
       }
       }

    



?>