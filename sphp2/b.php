<?php 
//var_dump($_GET);
//recuperation des valeurs saisies dans le formulaire
//depuis le tableau associatif : $_GET
$prix=$_GET['prix'];
$qte=$_GET['qte'];
$tht=$prix*$qte;
if(empty($prix)) {
	echo "<h3>le prix est obligatoire</h3>";
}

if (empty($qte)) {
	echo "<h3>la quantité est obligatoire</h3>";
}


if (is_numeric($prix)) {
	echo "oui , le prix est un nombre";
}else{
	echo "le prix n'est pas un nombre";
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
<meta charset="utf-8">
 	<title>la page de réception</title>
 </head>
 <body>

 	<h2>
 		le prix est : <?php echo "$prix" ; ?>  Dhs
 	</h2>
 		<h2>
 		le quantité est : <?php echo "$qte" ; ?>  
 	</h2>
 		<h2>
 		le tht est : <?php echo "$tht" ; ?>  Dhs
 	</h2>
 
 </body>
 </html>