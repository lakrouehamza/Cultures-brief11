<?php 
class Categorie{
    private ?int $id;
    private ?String $title;
    private ?int $admin;
    public function __construct()
    {
        
    }
    public function setId($id){
        $this->id =$id;
    }
    public function setTitre($title){
        $this->title =$title;
    }
    public function setAdmin($admin){
        $this->admin =$admin;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitre(){
        return $this->title;
    }
    public function getAdmin(){
        return $this->admin;
    }
    public function remplir(){
        $id =  $this->getId();
        $conn = new Connect();
        $stmt= $conn->getConnect()->prepare("select *  from  Categorie where id = :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $this->setTitre($row['titre']);
            $this->setAdmin($row['admin']);
            return true ;
        }
        return false;
    }
}
?>