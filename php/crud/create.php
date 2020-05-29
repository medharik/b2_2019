<?php 
include("modeles.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouveau produit</title>
    <?php include("_css.php");?>
</head>
<body>
<?php include_once("_menu.php");?>
<div class="container">
    <div class="row">
        <div class="col-md-6 shadow p-3 mx-auto mt-3">

        <form action="store.php" method="post" enctype="multipart/form-data">

<fieldset>
<legend class="text-primary text-center">Nouveau produit : </legend>
        <div class="form-groupe">Libellé : <label for="prix"></label><input type="text" name="libelle" class="form-control">
        
        </div>
        
        <div class="form-group">Prix : <label for="prix"></label><input required type="number" name="prix" class="form-control">
        
        </div>
        <div class="form-group">Place : <label for="prix"></label>
        <input type="text" name="place" class="form-control">
        
        </div>
        <div class="form-group">Photo : <label for="photo"></label><input type="file" name="photo" class="form-control">
        
        </div>
        <div class="form-group">Categorie  : 
        <label for="photo"></label>
<?php
  $categories=all("categorie");

?>
        <select type="text" name="categorie_id" class="form-control">

<?php foreach($categories as $c) {?>
<option value="<?=$c['id']?>"><?=$c['nom']?></option>
       
<?php } ?>
        </select>
        
        </div>
        <button class="btn- btn-primary btn-block col-md-6 mx-auto mt-3">
        Valider
        </button>
      </fieldset>
        </form>
        
        </div>
    </div>
</div>
    
</body>
</html>