<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>nouveau produit</title>
</head>
<body>

<form action="create.php" method="post">
<fieldset>
	<legend align="center">Nouveau produit : </legend>
	<table align="center">
		<tr>
			<td>Libellé :</td>
			<td><input type="text" name="libelle" required=""></td>
		</tr>
		<tr>
			<td>Prix :</td>
			<td><input type="number" name="prix" required=""></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Ajouter"></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>