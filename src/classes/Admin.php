<?php 
require_once("Utilisateur.php");
require_once("Categorie.php");
class Admin extends Utilisateur{
public function crretionCategorie($categorie){
    if($categorie instanceof Categorie){
        $connect = new Connect();
        $stmt = $connect->getConnect()->prepare("insert into Categorie(titre,admin) values (:titre,:admin)");
        $titre = $categorie->getTitre();
        $admin = $categorie->getAdmin();
        $stmt->bindParam(":titre",$titre);
        $stmt->bindParam(":admin",$admin);
        return $stmt->execute();
    }
    return false;
}
}

?>