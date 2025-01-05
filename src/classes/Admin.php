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
public function updateCategorie($categorie , $newCategorie){
    $conn =  new Connect();
    $stmt = $conn->getConnect()->prepare("update Categorie set titre = :titre where id = :id");
    $titre = $newCategorie->getTitre();
    $id = $categorie->getId();
    $stmt->bindParam(":titre",$titre);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
}

public function listArticle(){
    $conn = new Connect();
    $stmt = $conn->getConnect()->prepare("select *  from  selectArticl");
    $stmt->execute();
    return $stmt;
}
public function listArticle_encore(){
    $conn = new Connect();
    $stmt = $conn->getConnect()->prepare("select *  from  selectArticl_encour");
    $stmt->execute();
    return $stmt;
}
public function SeleteArticle(){
    $conn = new Connect();
    $stmt = $conn->getConnect()->prepare("select *  from  Article");
    $stmt->execute();
    return $stmt;
}

public function confirmeArticle($id ,$status){
    $conn = new Connect();
    $stmt = $conn->getConnect()->prepare("call confirmeArticle(:id,:statu) ;");
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);
    $stmt->bindParam(":statu",$status,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
public function deleteArticle($article){
    if($article instanceof Article){
        $connect =  new Connect();
        $stmt = $connect->getConnect()->prepare("delete from  article where id = :id");
        $id = $article->getId();
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return true;
    }
    else return false;
}

};

?>


<!-- 
public function ecrireArticle($article) {
    if ($article instanceof Article) {
        $connect = new Connect();
        $stmt = $connect->getConnect()->prepare("
            INSERT INTO article (statut, auteur, titre, container, categor, dateArticle)
            VALUES (:statut, :auteur, :titre, :container, :categor, :dateArticle)
        ");
        $statut = $article->getStatut();
        $auteur = $this->getId();  
        $titre = $article->getTitre();
        $container = $article->getContainer(); 
        $categor = $article->getCategor();
        $dateArticle = date('Y-m-d'); 
        $stmt->bindParam(":statut", $statut, PDO::PARAM_STR);
        $stmt->bindParam(":auteur", $auteur, PDO::PARAM_INT);
        $stmt->bindParam(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindParam(":container", $container, PDO::PARAM_STR); 
        $stmt->bindParam(":categor", $categor, PDO::PARAM_INT);
        $stmt->bindParam(":dateArticle", $dateArticle, PDO::PARAM_STR); 
        $stmt->execute()
            return $stmt;
        } else 
            return null;
} -->