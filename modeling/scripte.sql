create database cultures;
use cultures;
create table Utilisateur (
    id int primary key auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    password varchar(100) not null,
    role  enum('membre','admin','auteur')
);