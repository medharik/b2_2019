<?php 
include("modeles.php");
$produits=all();
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
<a href="create.php" class="btn btn-primary float-right my-3">Nouveau</a>
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
        <td><a href="" class="btn btn-sm btn-danger">Supprimer</a>
        <a href="" class="btn btn-sm btn-warning">Modifier</a>
        <a href="" class="btn btn-sm btn-info">Consulter</a></td></tr>
       <?php } ?>

    </tbody>
    
    </table>

</div>
    
</body>
</html>