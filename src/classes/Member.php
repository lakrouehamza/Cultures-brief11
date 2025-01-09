<?php 
require_once("Utilisateur.php");
class Member extends Utilisateur{
    public function liste(){
    $conn = new Connect();
        $stmt = $conn->getConnect()->prepare("select  * from   Article ");
        $stmt->execute();
        return $stmt;
    }
    public function listArticle($id){
        $conn = new Connect();
        if($id==0)
            $stmt = $conn->getConnect()->prepare("select a.* , l.nombre ,count(m.id) as commit from  Article a ,lesviews l ,lescommits m  where m.article = a.id and l.article = a.id and statut ='confirme' order by dateArticle ");
        else{
            $stmt = $conn->getConnect()->prepare("select a.* , l.nombre ,count(m.id) as commit from  Article a ,lesviews l ,lescommits m  where m.article = a.id and l.article = a.id and  categor = :id and  statut ='confirme' order by dateArticle ");
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
    $stmt =  $conn->getConnect()->prepare("update   lesviews set nombre = nombre +1  where article = :id");
    $stmt->bindParam(":id",$ida);
    $stmt->execute();
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
    public function commit($article,$commit){
        $conn = new Connect();
        $id = $this->getId();
        $article = $article->getId() ;
        $commiti = $commit->getContraire() ;
        $repy = $commit->getReply() ;
        $stmt =  $conn->getConnect()->prepare("insert into lescommits (contraire,auteur,reply,article) values ( :contraire , :auteur , :reply , :article ) ");
        $stmt->bindParam(":contraire",$commiti);
        $stmt->bindParam(":auteur",$id);
        $stmt->bindParam(":reply",$repy);
        $stmt->bindParam(":article",$article);
        return $stmt->execute();
    }
    public function  search($mot){
        $connect  =  new Connect();
        $stmt =  $connect->getConnect()->prepare("select  a.*  
                                                  from  article a , Categorie c ,  Utilisateur auteur, Utilisateur licteur , lescommits m
                                                  where a.categor = c.id  and a.auteur = auteur.id and a.id = m.article and m.auteur = licteur.id  
                                                  and (a.contraire like :mot 
                                                  or a.titre like :mot or  c.titre like :mot
                                                   or auteur.nom like :mot or  auteur.prenom like :mot 
                                                   or licteur.nom like :mot or  licteur.prenom like :mot 
                                                   or m.contraire like :mot)");
        $mot = '%'.$mot.'%';
        $stmt->bindParam(":mot" ,$mot,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
    // public function countCommit($article){
    //     $connect =  new Connect();
    //     $stmt = $connect->getConnect()->prepare("select count(*)  from article ")
    // }
}  
?> 