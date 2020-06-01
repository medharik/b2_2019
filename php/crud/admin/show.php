<?php 
include("modeles.php");
$id=$_GET['ounacer'];
$categorie=find($id,"categorie");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouveau categorie</title>
    <?php include("_css.php");?>
</head>
<body>
<?php include_once("_menu.php");?>
<div class="container">
   <div class="row">
       <div class="col-md-6 mx-auto">
       <div class="card" style="width: 18rem;">
  <img src="<?=$categorie['photo']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$categorie['nom']?></h5>
    <a href="#" onclick="history.go(-1)" class="btn btn-primary">Retour</a>
  </div>
</div>
       
       </div>
   </div>
</div>







    
</body>
</html>
