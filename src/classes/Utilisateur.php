<?php
require_once("Connect.php");
class Utilisateur{
    protected ?int $id;
    protected ?String $email;
    protected ?String $nom;
    protected ?String $prenom;
    protected ?String $password;
    protected ?String $role;
    protected ?String $photo;
    public function __construct($id=0,$email='',$nom='',$prenom='',$password='',$role="member",$photo ='')
    {
        $this->id=$id;
        $this->email=$email;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->password=$password;
        $this->role=$role;
        $this->photo=$photo;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setPhoto($photo){
        $this->photo=$photo;
    }
    public function getPhoto(){
        return $this->photo;;
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
    public function afectation( $user){
        $this->setId($user->getId());
        $this->setPrenom($user->getPrenom());
        $this->setNom($user->getNom());
        // $this->setPassword($user->getPassword());
        $this->setEmail($user->getEmail());
        // $this->setRole($user->getRole());
    }
    public function setSession(){
        session_start();
        $_SESSION['email']  = $this->getEmail();
        $_SESSION['role']  = $this->getRole();
    }
    public function logout(){
        session_unset();
        session_destroy();
    }
    public function login(){
        $connect = new Connect();
        $stmt = $connect->getConnect()->prepare("select * from utilisateur  where email = :email");
        $email = $this->getEmail();
        $stmt->bindParam(":email",$email);
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
 
                    header('Location: ../memberPages/home.php');
                    exit;
                }
                elseif($row['role']=="auteur"){
                    header('Location: ../auteurPages/home.php');
                    exit;
                }else echo "in role";
            }else echo "in password";
        }else echo "in email";
    }

   
    public function signUp(){
        $connect = new Connect();
        $stmt = $connect->getConnect()->prepare("select *  from  utilisateur where email = :email");
        $email = $this->getEmail();
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        if(!($row = $stmt->fetch(PDO::FETCH_ASSOC))){
            $nom = $this->getNom();
            $prenom = $this->getPrenom();
            $email = $this->getEmail();
            $role = $this->getRole();
            $photo = $this->getPhoto();
            $password = $this->getPassword();
            $password = password_hash($password, PASSWORD_BCRYPT);
            $stmt =$connect->getConnect()->prepare("insert into utilisateur (nom,prenom,email,password,role,photo) values ( :nom , :prenom , :email , :password , :role , :photo)");
            $stmt->bindParam(":nom", $nom,PDO::PARAM_STR);
            $stmt->bindParam(":prenom", $prenom ,PDO::PARAM_STR);
            $stmt->bindParam(":email", $email ,PDO::PARAM_STR);
            $stmt->bindParam(":password", $password ,PDO::PARAM_STR);
            $stmt->bindParam(":role", $role ,PDO::PARAM_STR);
            $stmt->bindParam(":photo", $photo ,PDO::PARAM_STR);
            $stmt->execute();
            header("Location: login.php");
            exit;
        }
    }

    public function remplir(){
        $email =  $this->getEmail();
        $conn = new Connect();
        $stmt= $conn->getConnect()->prepare("select *  from  Utilisateur where email = :email");
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $this->setNom($row['nom']);
            $this->setPrenom($row['prenom']);
            $this->setId($row['id']);
            $this->setRole($row['role']);
            $this->setPassword($row['password']);
            $this->setPhoto($row['photo']);
            return true ;
        }
        return false;
    }
    public function selectCategorie(){
        $conn = new Connect();
        $stmt = $conn->getConnect()->prepare("select *  from  Categorie");
        $stmt->execute();
        return $stmt;
    }
};
?>