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
    public function setSession(){

    }
    public function login(){
        $connect = new Connect();
        $stmt = $connect->getConnect()->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(":email",$this->email);
        $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if (password_verify($this->getPassword(), $row['password'])) {
                $this->setRole($row['role']);
                $this->setSession();
                if($row['role']=="admin"){
                    header('Location: ../adminPages/home.php');
                    exit;
                }
                elseif($row['role']=="membre"){
                    header('Location: ../memnerPages/home.php');
                    exit;
                }
                elseif($row['role']=="auteur"){
                    header('Location: ../auteurPages/home.php');
                    exit;
                }
            }
        }
    }

    public function signUp(){
        $connect = new Connect();
        $stmt = $connect->getConnect()->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(":email",$this->email);
        $stmt->execute();
        if(!($row = $stmt->fetch(PDO::FETCH_ASSOC))){
            $nom = $this->getNom();
            $prenom = $this->getPrenom();
            $email = $this->getEmail();
            $role = $this->getRole();
            $password = $this->getPassword();
            $stmt =$connect->getConnect()->prepare("insert into utilisateur (nom,prenom,email,role,password) values (:nom,:prenom,:email,:role,:password)");
            $stmt->bindParam(":nom", $nom);
            $stmt->bindParam(":prenom", $prenom);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":role", $role);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
        }
    }
};
?>