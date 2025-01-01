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
};
?>