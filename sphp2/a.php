<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>formulaire dans la page d'envoi</title>
</head>
<body>
	<form action="b.php">
		Prix : <input type="text" name="prix" >
		Quantité : <input type="number" name="qte"  min="1" max="10" maxlength="3" >
		<input type="submit"  value="valider" name="ok">
	</form>


</body>
</html>