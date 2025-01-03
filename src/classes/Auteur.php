<?php 
require_once("Utilisateur.php");
require_once("Article.php");
class Auteur extends Utilisateur{
    public function ecrireArticle($article){
        if($article instanceof Article ){
            $connect = new Connect();
            $stmt = $connect->getConnect()->prepare("insert  into article (statut ,auteur,titre,contraire,categor) values (:statut ,:auteur,:titre,:contraire,:categor)");
            $statut = $article->getStatut();
            $auteur =$this->getId();
            $titre = $article->getTitre();
            $containere =$article->getContainer();
            $categor = $article->getCategor();
            $stmt->bindParam(":statut",$statut,PDO::PARAM_STR);
            $stmt->bindParam(":auteur",$auteur,PDO::PARAM_INT);
            $stmt->bindParam(":titre",$titre,PDO::PARAM_STR);
            $stmt->bindParam(":contraire",$containere,PDO::PARAM_STR);
            $stmt->bindParam(":categor",$categor,PDO::PARAM_INT);
            $stmt->execute();
            return  $stmt;
        }
        else return null;
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
    public function editArticle($article,$newArticle){
        if(($article instanceof Article)  && ($newArticle instanceof Article) ){
            $connect = new Connect();
            $stmt = $connect->getConnect()->prepare("update article set statut = :statut , titre = :titre ,contraire = :contraire ,categor = :categor where id = :id");
            $statut = $newArticle->getStatut();
            $titre = $newArticle->getTitre();
            $containere =$newArticle->getContainer();
            $categor = $newArticle->getCategor();
            $id = $article->getId();
            $stmt->bindParam(":statut",$statut,PDO::PARAM_STR);
            $stmt->bindParam(":titre",$titre,PDO::PARAM_STR);
            $stmt->bindParam(":contraire",$containere,PDO::PARAM_STR);
            $stmt->bindParam(":categor",$categor,PDO::PARAM_INT);
            $stmt->bindParam(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        else 
        return false;
    }
    public function listArticle(){
        $conn = new Connect();
        $stmt = $conn->getConnect()->prepare("select *  from  Article");
        $stmt->execute();
        return $stmt;
    }
};
?>