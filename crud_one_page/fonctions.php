<?php 
function  connecter_db(){
	$cnx= new PDO("mysql:host=localhost;dbname=db2019","root", "");
return  $cnx;
}
function ajouter_produit($libelle,$prix)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into produit(libelle,prix) values(?,?)");
	$rp->execute(array($libelle,$prix));
}


function modifier_produit($libelle,$prix,$id)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("update produit set libelle=? , prix=? where id=?");
	$rp->execute(array($libelle,$prix,$id));
}
function supprimer_produit($id)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("delete from produit where id=?");
	$rp->execute(array($id));
}


function get_all()
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from produit ");
	$rp->execute(array());
	$data=$rp->fetchAll();
	return $data;
}

function get_by_id($id)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from produit where id=?");
	$rp->execute(array($id));
	$data=$rp->fetch();
	return $data;
}



 ?>