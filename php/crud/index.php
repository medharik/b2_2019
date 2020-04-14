<?php 
include("modeles.php");
$produits=all();
$notice="";
$classe="d-none";
if(isset($_GET['op'])){
 $classe="d-block mt-3";   
$op=$_GET['op'];
    if($op=='del'){
        $notice="Suppression effectuee avec succes ";
    }
    if($op=='upd'){
        $notice="Modification effectuee avec succes ";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouveau produit</title>
    <?php include("_css.php");?>
</head>
<body   oncontextmenu="return false">
<?php include_once("_menu.php");?>
<div class="container">
<a href="create.php" class="btn btn-primary float-right my-3">Nouveau</a>
<div class="alert alert-info <?=$classe?>" style="clear:both"><?=$notice?></div>
    <table class="table table-striped">
    <thead>
     <tr>
     <th>#</th>
        <th>Libelle</th>
        <th>Prix</th>
        <th>Actions</th></tr>
    </thead>
    <tbody>
       <?php foreach($produits as $p) {?>
       <tr> <td><?=$p['id']?></td>
        <td><?=$p['libelle']?></td>
        <td><?=$p['prix']?></td>
        <td>    <a onclick="return confirm('supprimer?')"  href="delete.php?id=<?=$p['id']?>" class="btn btn-sm btn-danger">Supprimer</a>

        <a href="edit.php?id=<?=$p['id']?>" class="btn btn-sm btn-warning">Modifier</a>
        <a href="show.php?ounacer=<?=$p['id']?>" class="btn btn-sm btn-info">Consulter</a></td></tr>
       <?php } ?>

    </tbody>
    
    </table>

</div>
    
</body>
</html>