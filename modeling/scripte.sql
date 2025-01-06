create database cultures
use cultures;

drop  table utilisateur;
drop table admin;
drop  table Members;
drop table Auteur;

create table Utilisateur (
    id int primary key auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    password varchar(100) not null,
    role  enum('membre','admin','auteur')
);
create table Admin (
    id int primary key ,
    constraint FK_admin  FOREIGN KEY(id) references Utilisateur(id) on delete cascade on update cascade 
);
create table Members (
    id int primary key ,
    constraint FK_member  FOREIGN KEY(id) references Utilisateur(id) on delete cascade on update cascade
);
create table Auteur (
    id int primary key ,
    constraint FK_auteur  FOREIGN KEY(id) references Utilisateur(id) on delete cascade on update cascade
);
create table Categorie (
    id int primary key auto_increment ,
    titre varchar(100) not null,
    admin int not null,
    constraint FK_adminCtgr  foreign  key (admin) references  Admin(id) on delete cascade on update cascade
);
create table Article (
    id int primary key auto_increment ,
    statut enum('confirme','annule','encours'),
    auteur int not null,
    titre varchar(100) not null,
    contraire text  not null,
    categor int not null,
    constraint  FK_auteurArtcl  foreign key (auteur) references Auteur (id) on delete cascade on update cascade,
    constraint FK_typeArticle foreign key (categor) references Categorie(id) on delete cascade on update cascade
);
create  table leslikes (
    id int primary key auto_increment,
    membre int not null,
    article int not null,
    constraint FK_ArticleLik foreign key (article) references Article(id) on delete cascade on update cascade,
    constraint FK_AuteurLik foreign key (membre) references Members (id) on delete cascade on update cascade
 );
 create  table lesviews(
    article int primary key,
    nombre int not null default 0,
    constraint FK_Articlewies foreign key (article) references Article(id) on delete cascade on update cascade
 ); 
create table lescommits(
    id int primary key auto_increment,
    contraire varchar(100) not null,
    auteur int not null,
    reply  int ,
    constraint FK_AuteurCommit foreign key (auteur) references Members (id) on delete cascade on update cascade,
    constraint FK_Rply foreign key(reply) references lescommits(id) on delete cascade on update cascade
);

create trigger insertView 
after insert on Article 
for each row 
insert into lesviews values(new.id);
begin 
end ;
//


insert into Categorie (titre , admin) values ('Drama',3);




DELIMITER //
create Trigger insetRole
after insert 
on Utilisateur
for each row 
begin 
if new.role = 'admin' then 
insert into Admin values (new.id);
elseif new.role = 'auteur' then
insert into Auteur values (new.id);
else 
insert into Members values (new.id);
end if;
end; //
DELIMITER ;

delimiter//
create trigger insertViews
after insert on Article 
for each row
begin
insert into lesviews values(new.id,0);
end ;
//
delimiter ;

​



delimiter //
create procedure confirmeArticle(in Nid int, in Nstatut varchar(20))
begin
    if Nstatut = 'annule' then 
        delete from article where id = Nid;
    else 
        update article set statut = Nstatut where id = Nid;
    end if;
end;
//
delimiter ;


create view selectArticl as
select a.id as articleID ,a.statut,a.auteur ,a.titre as titreArticle ,a.contraire,u.nom ,u.prenom,u.email,c.titre as titreCategorie 
from  Article a , Categorie c ,Utilisateur  u 
 where a.categor = c.id and a.auteur = u.id;

create view selectArticl_encour as
select a.id as articleID ,a.statut,a.auteur ,a.titre as titreArticle ,a.contraire,u.nom ,u.prenom,u.email,c.titre as titreCategorie 
from  Article a , Categorie c ,Utilisateur  u 
 where a.statut='encours' and a.categor = c.id and a.auteur = u.id;

DELIMITER //
create function nombreTotal(titre varchar(100))
returns int 
begin 
declare total int ;
  select count(*)  into total  from  Article  , Categorie  where Article.categor = Categorie.id and Categorie.titre=titre;
return total;
end;
//
DELIMITER ;

DELIMITER //
create   procedure  lesauteursActifs(in limitauteur int ) 
begin 
select * from utilisateur u  , Article ar  where   u.id =ar.auteur  group by ar.id order by count(ar.id)   limit limitauteur;
end ;
//
DELIMITER;

Trouver le nombre total d'articles publiés par catégorie.
Identifier les auteurs les plus actifs en fonction du nombre d'articles publiés.
Calculer la moyenne d'articles publiés par catégorie.
Créer une vue affichant les derniers articles publiés dans les 30 derniers jours.
Trouver les catégories qui n'ont aucun article associé

-- script sql
select a.*  ,count(ar.id) 
from auteur a ,article ar
 where a.id =ar.auteur 
 order by count(ar.id) limit 10;

----
        select  c.* ,avg()  
 from  Categorie  c ,article a 
 where c.id = a.categor 

