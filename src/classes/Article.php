<?php
class Article{
private ?int $id;
private ?String $statut;
private ?int $auter;
private ?String $titre;
private ?int $categor;
private ?String $container;
public function __construct($id=0,$statut,$auter,$titre,$categor, $container)
{
    $this->id=$id;
    $this->statut=$statut;
    $this->auter=$auter;
    $this->titre=$titre;
    $this->categor=$categor;
    $this->container=$container;
}
public function setId($id){
    $this->id =$id;
}
public function setStatut($statut){
    $this->statut =$statut;
}
public function setAuter($auter){
    $this->auter =$auter;
}
public function setTitre($titre){
    $this->titre =$titre;
}
public function setCategor($categor){
    $this->categor =$categor;
}
public function setContainer($container){
    $this->container =$container;
}
public function getTitre(){
    return $this->titre ;
}
public function getStatut(){
    return $this->statut ;
}
public function getAuter(){
    return $this->auter ;
}
public function getCategor(){
    return $this->categor ;
}
public function getContainer(){
    return $this->container ;
}
public function getId(){
    return $this->id ;
}
}
?>