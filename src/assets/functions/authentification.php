<?php

function authentificationAdmin(){
    session_start();
    if(!$_SESSION['role'])
        header("../authentification/login.php");
    elseif($_SESSION['role']=="admin"){}
    elseif($_SESSION['role']=="member") 
        header("../memberPages/home.php");
    elseif($_SESSION['role']=="auteur") 
        header("../auteurPages/home.php");
}
function authentificationMember(){
    session_start();
    if(!$_SESSION['role'])
        header("../authentification/login.php");
    elseif($_SESSION['role']=="member"){}
    elseif($_SESSION['role']=="admin") 
        header("../adminPages/home.php");
    elseif($_SESSION['role']=="auteur") 
        header("../auteurPages/home.php");
}
function authentificationAuteur(){
    session_start();
    if(!$_SESSION['role'])
        header("../authentification/login.php");
    elseif($_SESSION['role']=="auteur"){}
    elseif($_SESSION['role']=="member") 
        header("../memberPages/home.php");
    elseif($_SESSION['role']=="admin") 
        header("../adminPages/home.php");
}
function authentification(){
    session_start();
    if(!$_SESSION['role']){}
    elseif($_SESSION['role']=="auteur"){
        header("../auteurPages/home.php");
    }elseif($_SESSION['role']=="member") 
        header("../memberPages/home.php");
    elseif($_SESSION['role']=="admin") 
        header("../adminPages/home.php");
}
?>