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
}
?>