<?php 

include 'fonctions.php';
extract($_GET);//$id $_GET['id']

supprimer_produit($id);
	header("location:index.php?del=ok");
 ?>