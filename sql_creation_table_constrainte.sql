SQL => 1- LDD => langage de définition des données :
commandes utilisées => create , alter , drop
create table client(
idclient int primary key auto_increment,
nom varchar(100),
prenom varchar(100)
)
create table facture (
numfacture int primary key auto_increment,
datefacture date not null,
idclient int  ,
constraint foreign key (idclient)
 references client (idclient)
)
create table produit (
ref int primary key auto_increment,
libelle varchar(100) unique ,
prixunitaire float not null,
qtestock int default 0,
nomtype varchar(100)  ,
constraint foreign key (nomtype) 
references type (nomtype), 
constraint check (prix> 1)
)
create table facture_produit (
numfacture int  ,
ref int ,
qtevendue int ,
constraint primary key(numfacture, ref) ,
constraint foreign key (numfacture) 
references facture (numfacture),
constraint foreign key (ref)
 references produit (ref)
)
les 5 contraintes de la base de données 
not null,
unique, 
primary key => unique + not null
foreign key => permet de faire des relations
check => verification des données 
exemple : check salaire > 2000

2=> drop (supprimer)
drop table client => supprimer la table client
3=> alter (modifier dans la structure)
alter table client add salaire float => ajout la colonne salaire dans la table client

alert table client drop salaire  => supprimer la colonne salaire de la table client

alert table client  change salaire int 
cas parliculier (les contraintes)
alert table client add constraint check (salaire > 1300)

-- LMD => L. manipulation des données
=> insert , update , delete 
on considère la table 
insert into facture (date, idclient)
values('2018-12-12', 3) => permet d'ajouter
une facture (sa date et l(idclient) de cette facture)

-- modification des données
update produit set
 prix =9000, 
qtestock =20
where libelle = 'hp'
=> permet de mettre (set) le prix à 9000 
et la qtestock à 20 pour les produits ayant libellé = 'hp'
exemple 2=> changer le prix à 3500
 de tous les produits qui coutent plus de 4000 dhs 
 et qui ont une qtestock <10 
 
 update produit set
 	prix=3500 
 	where prix >4000 and qtestock <10


-- delete => supprimer données
delete from produit => supprime tous les produits
delete from produit where ref=3
		=> supprime le produit ayant ref=3
delete from produit where qtestock=0 => supprime
	tous le produit qui ne sont plus en stock
-- LID => langage Interogation des données
=> SELECT 
select * from produit => selectionne toutes les infos(ref,libelle, qtestock,...)
de tous les produits
=> select libelle, prix from produit => selectionne 
LE LIBELLE ET LE PRIX de tous les produits
-- select * from produit where prix > 10000
=>selectionne tous les produits  (tous les attributs)
ayant un prix qui dépasse 10000
exemple 1 : liste des produits qui s'appellent hp dv 5
et ayant une qtestock <10
select * from produit 
where  libelle='hp dv5' and qtestock <10 

exemple 2 =>liste des produits ayant un prix entre 3000 et 4000
select * from produit where prix >=3000 and prix <=4000
ou 
select * from produit where prix between 3000 and 4000

select *  from employees   
where first_name like '%ll%' and last_name like '%a'



-- le jointures (2 tables ou plus )
-- jointures 
select first_name , last_name , department_name 
from employees , DEPARTMENTS
where
 employees.DEPARTMENT_ID = DEPARTMENTS.DEPARTMENT_ID
and first_name like 'Stev%'
-- listes des employees travaillant dans l'IT_PROG

select first_name , last_name , department_name
from employees e , DEPARTMENTS d
where e.department_id=d.DEPARTMENT_ID and
department_name='IT'