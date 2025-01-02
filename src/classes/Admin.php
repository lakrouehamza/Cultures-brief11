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
        $stmt->bindParam(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindParam(":admin",$admin,PDO::PARAM_INT);
        return $stmt->execute();
    }
    return false;
}

public function deleteCategorie($categorie){
    if($categorie instanceof Categorie ){
        $conn =  new Connect();
        $stmt = $conn->getConnect()->prepare("delete from Categorie where id = :id and admin = :admin");
        $admin = $this->getId();
        $id =  $categorie->getId();
        $stmt->bindParam("id",$id,PDO::PARAM_INT);
        $stmt->bindParam(":admin",$admin,PDO::PARAM_INT);
        return $stmt->execute();
    }
    return false;
}


};

?>