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

}
?>