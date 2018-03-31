<?php 
include 'fonctions.php';
extract($_POST);
extract($_GET);
$btn="ajouter";
$titre="Nouveau produit";
//si ajout
if (isset($libelle) && isset($prix) && !empty($libelle) && !isset($id)) {
  ajouter_produit($libelle, $prix);
  header("location:produits.php?m=addok");

}
//si modif
if (isset($libelle) && isset($prix) && !empty($libelle) && 
  isset($id)) {
  modifier_produit($libelle, $prix, $id);
  header("location:produits.php?m=updok");

}

if (isset($ids)) {
  supprimer_produit($ids);
    header("location:produits.php?m=delok");

}

if (isset($idc)) {
 $produit=get_by_id($idc);
   

}
if (isset($idm)) {
 $produit_a_modifier= get_by_id($idm);
 $btn='modifier';
 $titre="modification du produit : ".$produit_a_modifier['libelle'];
}


$produits=get_all();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edtions des produits</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <div class="container">
    <?php if (isset($m) && $m=='addok'): ?>
      <div class="alert alert-success" role="alert">
        <strong>Bien fait,</strong> Ajout effectué avec succès
      </div>
    <?php endif ?>
     <?php if (isset($m) && $m=='delok'): ?>
      <div class="alert alert-danger" role="alert">
        <strong>Bien fait,</strong> suppression effectuée avec succès
      </div>
    <?php endif ?>
       <?php if (isset($m) && $m=='updok'): ?>
      <div class="alert alert-warning" role="alert">
        <strong>Bien fait,</strong> modification effectuée avec succès
      </div>
    <?php endif ?>


     <form class="form-horizontal" action="produits.php" method="post">

<fieldset>

<!-- Form Name -->
<legend><?php echo $titre; ?></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="libelle">Libellé :</label>  
  <div class="col-md-4">
  <input id="libelle" name="libelle" placeholder="" class="form-control input-md" required="" type="text" 
  value="<?php if(isset($produit_a_modifier)) echo $produit_a_modifier['libelle'] ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prix">Prix:</label>  
  <div class="col-md-4">
  <input id="prix" name="prix" placeholder="" class="form-control input-md" required="" type="text" value="<?php if(isset($produit_a_modifier)) echo $produit_a_modifier['prix'] ?>">
    <?php if (isset($produit_a_modifier)): ?>
      <input type="hidden"  name="id"
      value="<?php echo $produit_a_modifier['id']; ?>">
    <?php endif ?>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">
      <?php echo $btn; ?>

    </button>
  </div>
</div>

</fieldset>
</form>

<table class="table table-striped">
            <thead>
              <tr>
                <th>numéro</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
             
             <?php foreach ($produits as $p): ?>
               <tr>
                <td><?php echo $p['id'] ?></td>
                <td><?php echo $p['libelle'] ?></td>
                <td><?php echo $p['prix'] ?></td>
                <td><a class="btn btn-danger" href="produits.php?ids=<?php echo $p['id'] ?>">Supprimer</a>
<a class="btn btn-info" href="produits.php?idc=<?php echo $p['id'] ?>">Consulter</a>

<a class="btn btn-warning" href="produits.php?idm=<?php echo $p['id'] ?>">Modifier</a>


                </td>
              </tr>
             <?php endforeach ?>
              
             
            </tbody>
          </table>

   </div>
   <?php if (isset($produit)): ?>
     <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Consultation de : <?php echo $produit['libelle'] ?></h3>
            </div>
            <div class="panel-body">
              Prix : <?php echo $produit['prix'] ?>  Dhs
            </div>
          </div>
   <?php endif ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>