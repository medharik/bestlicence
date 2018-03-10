<?php 
include 'fonctions.php';
extract($_POST);//$libelle,$prix
ajouter_produit($libelle, $prix);
header("location:index.php?add=ok");

 ?>