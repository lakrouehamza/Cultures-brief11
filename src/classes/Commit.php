<?php  
require_once('Connect.php');
class Commit{
    private ?int $id ;
    private ?String $contraire;
    private ?int $auteur ;
    private ?int $reply ;
    public function __construct()
    {
    }
    public function getId(){
        return  $this->id;
    }
    public function setId($id){
        $this->id =$id;
    }
    public function getContraire(){
        return  $this->contraire;
    }
    public function setContraire($contraire) {
        $contraire = trim($contraire); 
        if (!empty($contraire)) {
            $this->contraire = $contraire;
        }
    }
    
    public function getAuteur(){
        return  $this->auteur;
    }
    public function setAuteur($auteur){
        $this->auteur = $auteur;
    }
    public function getReply(){
        return  $this->reply;
    }
    public function setReply($reply){
        $this->reply =$reply;
    }
    public  function rempler(){
        $conn = new Connect();
        $id = $this->getId();
        $stmt =  $conn->getConnect()->prepare("select c.* from  lescomment where id = :id");
        $stmt->bindParam(":id",$id);
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $this->setContraire($row['contraire']);
            $this->setAuteur($row['auteur']);
            $this->setReply($row['reply']);
        }
        return $stmt->execute();

    }
    public function selectCommit($id){
        $conn = new Connect();
        $stmt = $conn->getConnect()->prepare("          select c.* ,a.nom ,a.prenom ,a.photo  
                                                        from lescomment c ,utilisateur a 
                                                        where c.auteur = a.id and c.article = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;
    }
}

?>