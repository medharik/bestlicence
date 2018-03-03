<?php 
include 'fonctions.php';
extract($_POST);//extraire les infos envoyées depuis le form $libelle,$prix,$details
//on appelle la fct d'ajout 
ajouter_produit($libelle, $prix, $details);
//redicrection vers new.php en lui transmettant une info de succes
header("location:new.php?add=ok");
 ?>