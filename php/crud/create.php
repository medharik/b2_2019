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

        <form action="store.php" method="post">

<fieldset>
<legend class="text-primary text-center">Nouveau produit : </legend>
        <div class="form-groupe">Libellé : <label for="prix"></label><input type="text" name="libelle" class="form-control">
        
        </div>
        
        <div class="form-groupe">Prix : <label for="prix"></label><input type="text" name="prix" class="form-control">
        
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