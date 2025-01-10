create database cultures;
use cultures
drop  table utilisateur;
drop table admin;
drop  table Members;
drop table Auteur;
drop table Categorie;
drop table Article;
drop table leslikes;
drop table lesviews;
drop table lescommits;
drop trigger insertView ;
drop  Trigger insetRole;
create table Utilisateur (
    id int primary key auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    password varchar(100) not null,
    role  enum('membre','admin','auteur'),
    photo varchar(200) 
);
create table Admin (
    id int primary key ,
    constraint FK_admin  FOREIGN KEY(id) references Utilisateur(id) on delete cascade on update cascade 
);
create table Members (
    id int primary key ,
    banni int default 0,
    constraint FK_member  FOREIGN KEY(id) references Utilisateur(id) on delete cascade on update cascade
);
create table Auteur (
    id int primary key ,
    banni int default 0,
    constraint FK_auteur  FOREIGN KEY(id) references Utilisateur(id) on delete cascade on update cascade
);
create Trigger insertRole
after insert on Utilisateur
for each row 
begin 
if new.role = 'admin' then 
insert into Admin values (new.id);
elseif new.role = 'auteur' then
insert into Auteur values (new.id,0);
else 
insert into Members values (new.id,0);
end if;
end; //


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
    contenu text  not null,
    image varchar(100) ,
    categorie int not null,
    dateArticle  DATETIME DEFAULT CURRENT_TIMESTAMP,
    constraint  FK_auteurArtcl  foreign key (auteur) references Auteur (id) on delete cascade on update cascade,
    constraint FK_typeArticle foreign key (categorie) references Categorie(id) on delete cascade on update cascade
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
create table lescomment(
    id int primary key auto_increment,
    contenu varchar(100) not null,
    auteur int not null,
    reply  int ,
    article int not null,
    dataCommit DATETIME DEFAULT CURRENT_TIMESTAMP,
    constraint FK_AuteurCommit foreign key (auteur) references Members (id) on delete cascade on update cascade,
    constraint FK_Rply foreign key(reply) references lescommits(id) on delete cascade on update cascade,
    constraint FK_ArticleComit foreign key(article) references Article(id) on delete cascade on update cascade
);

-- CREATE  trigger  insertView 
-- after insert on Article 
-- for each row 
-- begin 
-- insert into lesviews values(new.id);
-- end 
-- //


-- insert into Categorie (titre , admin) values ('Drama',3);



 
create Trigger insertRole
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
select a.id as articleID ,a.statut,a.auteur ,a.titre as titreArticle ,a.contenu,u.nom ,u.prenom,u.email,c.titre as titreCategorie 
from  Article a , Categorie c ,Utilisateur  u 
 where a.categorie = c.id and a.auteur = u.id;

create view selectArticl_encour as
select a.id as articleID ,a.statut,a.auteur ,a.titre as titreArticle ,a.contenu,u.nom ,u.prenom,u.email,c.titre as titreCategorie 
from  Article a , Categorie c ,Utilisateur  u 
 where a.statut='encours' and a.categorie = c.id and a.auteur = u.id;

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

-- script sql
select a.*  ,count(ar.id) 
from auteur a ,article ar
 where a.id =ar.auteur 
 order by count(ar.id) limit 10;

--------------------------------------------------------------------scriptSQL--------------------------------
select  c.id ,c.titre ,count(a.id) as nombreTotal  
from  categorie c , article a 
where c.id = a.categorie 
group by c.id ; 
