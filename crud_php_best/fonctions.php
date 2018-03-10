<?php 

//connexion bd
//fonction => sous programme (module) permettant de traiter une tache spécifique 
 function connecter_db()
{
	$cnx = new PDO('mysql:host=localhost;dbname=dbproduit2018', "phpuser", "1234");
	return $cnx;
}

//ajouter 
function ajouter_produit($libelle, $prix,$details)
{
	//connexion db
$cnx= connecter_db();
	// preparer une requete sql dans cette conneexion
$rp=$cnx->prepare("insert into produit (libelle,prix,details) values (?,?,?)");
	// executer la requete
$rp->execute(array($libelle, $prix,$details));
}


//supprimer un produit (en lui donnant id)
function supprimer_produit($id)
{
	//connexion db
$cnx= connecter_db();
	// preparer une requete sql dans cette conneexion
$rp=$cnx->prepare("delete from produit where id=?");
	// executer la requete
$rp->execute(array($id));
}


//modifier un produit ($id) + les nouvelles données
function modifier_produit($id,$libelle, $prix,$details)
{
	//connexion db
$cnx= connecter_db();
	// preparer une requete sql dans cette conneexion
$rp=$cnx->prepare("update produit set libelle=?,prix=?,details=? where id=?");
	// executer la requete
$rp->execute(array($libelle, $prix,$details,$id));
}


//recuperer tout depuis la bd

function recuperer_tout_produit()
{
	//connexion db
$cnx= connecter_db();
	// preparer une requete sql dans cette conneexion
$rp=$cnx->prepare("select * from produit ");
	// executer la requete
$rp->execute(array());
$liste_produits=$rp->fetchAll();
return $liste_produits;
}

//recuprer un element par son id

function recuperer_produit_id($id)
{
	//connexion db
$cnx= connecter_db();
	// preparer une requete sql dans cette conneexion
$rp=$cnx->prepare("select * from produit  where id = ?");
	// executer la requete
$rp->execute(array($id));
$ligne=$rp->fetch();
return $ligne;
}
 ?>