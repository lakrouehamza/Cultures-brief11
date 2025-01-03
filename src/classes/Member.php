<?php 
require_once("Utilisateur.php");
class Member extends Utilisateur{
    public function listArticle($id){
        $conn = new Connect();
        if($id==0)
            $stmt = $conn->getConnect()->prepare("select *  from  Article");
        else{
            $stmt = $conn->getConnect()->prepare("select *  from  Article    where categor = :id");
            $stmt->bindParam(":id",$id);
        }
        $stmt->execute();
        return $stmt;

    }

}
?>