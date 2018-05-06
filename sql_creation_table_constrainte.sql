create table client(
idclient int primary key auto_increment,
nom varchar(100),
prenom varchar(100)
)
create table facture (
numfacture int primary key auto_increment,
datefacture date not null,
idclient int  ,
constraint foreign key (idclient) references client (idclient)
)
create table produit (
ref int primary key auto_increment,
libelle varchar(100) unique ,
prixunitaire float not null,
qtestock int default 0,
nomtype varchar(100)  ,
constraint foreign key (nomtype) references type (nomtype)
)
create table facture_produit (
numfacture int  ,
ref int ,
qtevendue int ,
constraint primary key(numfacture, ref) ,
constraint foreign key (numfacture) references facture (numfacture),
constraint foreign key (ref) references produit (ref)
)
les 5 contraintes de la base de données 
not null,
unique, 
primary key => unique + not null
foreign key => permet de faire des relations
check => verification des données 
exemple : check salaire > 2000
