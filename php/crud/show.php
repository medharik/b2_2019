<?php 
include("modeles.php");
$id=$_GET['ounacer'];
$produit=find($id);
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
       <div class="col-md-6 mx-auto">
       <div class="card" style="width: 18rem;">
  <img src="http://placehold.it/300x300" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$produit['libelle']?></h5>
    <p class="card-text">Prix : <?=$produit['prix']?>DHS</p>
    <a href="#" onclick="history.go(-1)" class="btn btn-primary">Retour</a>
  </div>
</div>
       
       </div>
   </div>
</div>







    
</body>
</html>
