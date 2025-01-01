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
}
?>