<?php 
class database{
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    protected $conn;
    
public function getConn(){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=gestion_contact", 'root', '');
        // echo "bravo";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
     return $conn;
    }
}

?>