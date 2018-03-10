<?php 
include 'fonctions.php';
	$data=get_all();
	extract($_GET);//$add, $del
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>liste des produits</title>
	<link rel="stylesheet" type="text/css" href="datatables.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="datatables.js"></script>

</head>
<body>
	<a href="nouveau.php">Nouveau</a>

	<?php if (isset($add) && $add=='ok'): ?>
	<h4>	ajout affectué avec succès</h4>
	<?php endif ?>

	<?php if (isset($del) && $del=='ok'): ?>
	<h4>	suppression affectuée avec succès</h4>
	<?php endif ?>
	<h2>liste des produits : </h2>

<table align="center" width="80%" border="1" id="tab">
<thead>
		<tr>
			<td>id</td>
			<td>libellé</td>
			<td>prix</td>
			<td>actions</td>
		</tr>
</thead>
	<tbody>

	<?php foreach ($data as $ligne): ?>
			<tr>
			<td><?php echo $ligne['id']; ?></td>
			<td><?php echo $ligne['libelle']; ?></td>
			<td><?php echo $ligne['prix']; ?></td>
			<td><a onclick="return confirm('supprimer ?')" href="delete.php?id=<?php echo $ligne['id']; ?>" >Supprimer</a></td>
		</tr>
	<?php endforeach ?>

</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
    $('#tab').DataTable();
});
</script>
</body>
</html>