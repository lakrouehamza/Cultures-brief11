<?php

function authentificationAdmin(){
    session_start();
    if(!isset($_SESSION['role'])){
        header("Location:./../authentification/login.php");
        exit;
    }
    elseif($_SESSION['role']=="admin"){}
    elseif($_SESSION['role']=="member"){ 
        header("Location:./../memberPages/home.php");
        exit;
    }
    elseif($_SESSION['role']=="auteur") {
        header("Location:./../auteurPages/home.php");
        exit;
    }
}
function authentificationMember(){
    session_start();
    if(!isset($_SESSION['role'])){
        header("Location:./../authentification/login.php");
        exit;
    }
    elseif($_SESSION['role']=="member"){}
    elseif($_SESSION['role']=="admin") {
        header("Location:./../adminPages/home.php");
        exit;
    }
    elseif($_SESSION['role']=="auteur") {
        header("Location:./../auteurPages/home.php");
        exit;
    }
}
function authentificationAuteur(){
    session_start();
    if(!isset($_SESSION['role'])){
        header("Location:./../authentification/login.php");
        exit;
    }
    elseif($_SESSION['role']=="auteur"){}
    elseif($_SESSION['role']=="member") {
        header("Location:./../memberPages/home.php");
        exit;
    }
    elseif($_SESSION['role']=="admin"){ 
        header("Location:./../adminPages/home.php");
        exit;
    }
}
function authentification(){
    session_start();
    if(!isset($_SESSION['role'])){}
    elseif($_SESSION['role']=="auteur"){
        header("Location:./../auteurPages/home.php");
        exit;
    }elseif($_SESSION['role']=="member") {
        header("Location:./../memberPages/home.php");
        exit;
    }
    elseif($_SESSION['role']=="admin") {
        header("Location:./../adminPages/home.php");
        exit;
    }
}
?>