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
}
?>