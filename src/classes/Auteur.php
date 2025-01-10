<?php 
require_once("Utilisateur.php");
require_once("Article.php");
class Auteur extends Utilisateur{
    private ?int $banni;
    public function __construct()
    {
        parent::__construct();
    }
    public function getBanni(){
        return $this->banni;
    }
    public function setBanni($banni){
         $this->banni = $banni;
    }
    public function ecrireArticle($article){
        if($article instanceof Article ){
            $connect = new Connect();
            $stmt = $connect->getConnect()->prepare("INSERT INTO Article (statut, auteur, titre, contenu, image, categorie, dateArticle) VALUES (:statut, :auteur, :titre, :contenu, :image, :categorie, :dateArticle)");            $statut = $article->getStatut();
            $auteur =$this->getId();
            $titre = $article->getTitre();
            $contenu =$article->getContainer();
            $categorie = $article->getCategor();
            $categorie = $article->getImage();
            $dateArticle = date('Y-m-d');
            $stmt->bindParam(":statut",$statut,PDO::PARAM_STR);
            $stmt->bindParam(":auteur",$auteur,PDO::PARAM_INT);
            $stmt->bindParam(":titre",$titre,PDO::PARAM_STR);
            $stmt->bindParam(":contenu",$contenu,PDO::PARAM_STR);
            $stmt->bindParam(":image",$image,PDO::PARAM_STR);
            $stmt->bindParam(":categorie",$categorie,PDO::PARAM_INT);
            $stmt->bindParam(":dateArticle",$dateArticle,PDO::PARAM_STR);
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
            $stmt = $connect->getConnect()->prepare("update article set statut = :statut , titre = :titre ,contenu = :contenu ,categorie = :categor where id = :id");
            $statut = $newArticle->getStatut();
            $titre = $newArticle->getTitre();
            $containere =$newArticle->getContainer();
            $categor = $newArticle->getCategor();
            $id = $article->getId();
            $stmt->bindParam(":statut",$statut,PDO::PARAM_STR);
            $stmt->bindParam(":titre",$titre,PDO::PARAM_STR);
            $stmt->bindParam(":contenu",$containere,PDO::PARAM_STR);
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
        $stmt = $conn->getConnect()->prepare("select *  from  Article where statut ='confirme' order by dateArticle ");
        $stmt->execute();
        return $stmt;
    }
    
    public function listTouteArticle(){
        $conn = new Connect();
        $stmt = $conn->getConnect()->prepare("select a.* , c.titre as titreCategorie from  Article a,Categorie c  where a.categorie = c.id  order by a.dateArticle ");
        $stmt->execute();
        return $stmt;
    }
    public function remplir()
    {
        $id =  $this->getId();
        $connect  =  new Connect();
        $stmt = $connect->getConnect()->prepare("select *  from  auteur where id = :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        return $stmt;
    }
    public function login()
    {
        $this->remplir();
        if($this->getBanni()==0)
            parent::login();
    }
    
};
?>