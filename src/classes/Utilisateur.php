<?php
class Utilisateur{
    protected ?int $id;
    protected ?String $email;
    protected ?String $nom;
    protected ?String $prenom;
    protected ?String $password;
    protected ?String $role;
    public function __construct($id='',$email='',$nom='',$prenom='',$password='',$role="member")
    {
        $this->id=$id;
        $this->email=$email;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->password=$password;
        $this->role=$role;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function setPrenom($prenom){
        $this->prenom=$prenom;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function setRole($role){
        $this->role=$role;
    }
    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function loign(){
        
    }
    public function signUp(){
        
    }
};
?>