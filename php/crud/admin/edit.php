<?php 
include("modeles.php");
$id=$_GET['id'];
$categorie=find($id,"categorie");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouvelle categorie</title>
    <?php include("_css.php");?>
</head>
<body>
<?php include_once("_menu.php");?>
<div class="container">
    <div class="row">
        <div class="col-md-6 shadow p-3 mx-auto mt-3">

        <form action="update_categorie.php" method="post">
<input type="hidden" name="id" value="<?=$categorie['id']?>">
<fieldset>
<legend class="text-primary text-center">Edition des informations du  categorie : </legend>
        <div class="form-groupe">Nom : <label for="prix"></label><input type="text"
         value="<?=$categorie['nom']?>" name="nom" class="form-control">
        
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