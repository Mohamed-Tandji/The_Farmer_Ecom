-- Active: 1690292354396@@127.0.0.1@3306
drop database if EXISTS Ferme;

create database Ferme;
use Ferme;

create table Personne(id  int primary key auto_increment,
Nom varchar(50) not null,
Prenom varchar(50) not null,
email varchar(150) not null,
mot_de_passe varchar(250) not null,
date_creation  Datetime,
date_mise_jour DateTime 
);

create table Role (id int primary key auto_increment ,
    titre varchar(50) not null
);
create table Personne_Role(
    id_role int DEFAULT 1,
    id_personne int,

    foreign key(id_role) references Role(id) on update cascade on delete CASCADE
);
alter TABLE Personne_Role
    Add CONSTRAINT fk_personne_role
    foreign key(id_personne) REFERENCES Personne(id)on update cascade on delete CASCADE ;

create table Adresse(
    id int PRIMARY key auto_increment ,
    code_postal VARCHAR(10) not null,
    numero_app VARCHAR(10) ,
    rue VARCHAR(50) ,
    ville VARCHAR(50) ,
    pays varchar(50) 
);
create table Personne_Adresse(
    id_personne int ,
    id_adresse int
);

alter table Personne_adresse
ADD CONSTRAINT fk_adresse_personne
foreign key (id_adresse) REFERENCES Adresse(id)on update cascade on delete CASCADE,
ADD CONSTRAINT fk_personne_adresse
 FOREIGN KEY(id_personne) REFERENCES Personne(id)on update cascade on delete CASCADE;
 create table Taureaux(id int primary key   auto_increment not null,
 nom VARCHAR(50),
 nom_pere varchar(50),
 nom_mere VARCHAR(50),
 prix DOUBLE,
 race VARCHAR(60),
 resistance int,
 race_type varchar(80),
  disponibilite int);
 create table Genisses(id int primary key  auto_increment not null,
 nom VARCHAR(50),
 nom_pere varchar(50),
 nom_mere VARCHAR(50),
 prix DOUBLE,
 capacite_lait double,
 race VARCHAR(60),
 resistance int,
 race_type varchar(80),
  disponibilite int);
 create table Produits(id int primary key auto_increment not NULL,
 nom varchar(60),
 categorie VARCHAR(50),
 prix DOUBLE,
 disponibilite int 
 );
 create table Semences(id int primary key auto_increment,
 nom_taureau varchar(60),
 origines VARCHAR(200),
 capacite_lait double,
 race VARCHAR(60),
 resistance int,
 race_type varchar(80),
  disponibilite int
 );
 create Table Commande(
    id_commande int PRIMARY KEY AUTO_INCREMENT,
    prix_total float,
    date_commande varchar(50),
    id_User int
);
create table Commande_produit(
    id_commande int,
    id_Taureaux int,
    quantite int
);
alter table Commande 
add constraint fk_commande_personne
FOREIGN KEY (id_User) REFERENCES Personne(id)on delete CASCADE on update CASCADE;

alter table Commande_produit
 add constraint fk_commande_produit
 FOREIGN key (id_commande) REFERENCES Commande(id_commande)on delete CASCADE on update CASCADE;

 alter table Commande_produit
 add constraint fk_produit_commande
 FOREIGN key (id_Taureaux) REFERENCES Taureaux(id)on delete CASCADE on update CASCADE;





 create table Image_Taureaux(
    id int PRIMARY key auto_increment not null,
    chemin VARCHAR(255),
    id_Taureaux int
);

-- modifier la table image_taureau 
alter table Image_Taureaux
    add CONSTRAINT fk_image_Taureaux
    foreign key(id_Taureaux) REFERENCES Taureaux(id) on delete cascade on update cascade;
    create table Image_Genisses(
    id int PRIMARY key auto_increment not null,
    chemin VARCHAR(255),
    id_Genisses int
);

-- modifier la table image_Genisse
alter table Image_Genisses
    add CONSTRAINT fk_image_Genisses
    foreign key( id_Genisses) REFERENCES Genisses(id) on delete cascade on update cascade;

-- modifier la table image_Genisse

    create table Image_Produits(
    id int PRIMARY key auto_increment not null,
    chemin VARCHAR(255),
    id_Produits int
);

-- modifier la table image_taureau 
alter table Image_Produits
    add CONSTRAINT fk_image_Produits
    foreign key(id_Produits) REFERENCES Produits(id) on delete cascade on update cascade;


    create table Image_Semences(
    id int PRIMARY key auto_increment not null,
    chemin VARCHAR(255),
    id_Semences int
);

-- modifier la table image_Semences
alter table Image_Semences
    add CONSTRAINT fk_image_Semences
    foreign key(id_Semences) REFERENCES Semences(id) on delete cascade on update cascade;

