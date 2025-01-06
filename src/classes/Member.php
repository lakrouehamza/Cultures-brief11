<?php 
require_once("Utilisateur.php");
class Member extends Utilisateur{
    public function listArticle($id){
        $conn = new Connect();
        if($id==0)
            $stmt = $conn->getConnect()->prepare("select *  from  Article where statut ='confirme' order by dateArticle ");
        else{
            $stmt = $conn->getConnect()->prepare("select *  from  Article    where categor = :id and  statut ='confirme' order by dateArticle ");
            $stmt->bindParam(":id",$id);
        }
        $stmt->execute();
        return $stmt;

    }
public function SelectLikes($article){
    $conn = new Connect();
    $ida = $article->getId();
    $idm = $this->getId();
    $stmt = $conn->getConnect()->prepare("select * from  leslikes where membre = :membre  and article = :article");
    $stmt->bindParam(":membre",$idm);
    $stmt->bindParam(":article",$ida);
    $stmt->execute();
    if($row = $stmt->fetch(PDO::FETCH_ASSOC))
        return 1;
    return 0;
}
public function wiews($article){
    $conn = new Connect();
    $ida = $article->getId();
    $stmt =  $conn->getConnect()->prepare("insert into leslikes(membre,article) values(:membre,:article)");
}
    public function lesLike($article){
        $conn = new Connect();
        $ida = $article->getId();
        $idm = $this->getId();
        $stmtSelecte = $conn->getConnect()->prepare("select * from  leslikes where membre = :membre  and article = :article");
        $stmtSelecte->bindParam(":membre",$idm);
        $stmtSelecte->bindParam(":article",$ida);
        $stmtSelecte->execute();
        if($row = $stmtSelecte->fetch(PDO::FETCH_ASSOC)){
            $id=$row['id'];
            $stmtDelete =  $conn->getConnect()->prepare("delete from leslikes where id = :id");
            $stmtDelete->bindParam(":id",$id);
            $stmtDelete->execute();
        } else {
        $stmt =  $conn->getConnect()->prepare("insert into leslikes(membre,article) values(:membre,:article)");
        $stmt->bindParam(":membre",$idm);
        $stmt->bindParam(":article",$ida);
        return $stmt->execute();
        }
    }

}
?>