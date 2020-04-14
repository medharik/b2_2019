<?php 
include ("functions.php");
$produits=all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<div class="container">
<h3>Liste des produits : </h3>
<table class="table">
<thead>
<tr>
    <th>id</th>
    <th>Libelle</th>
    <th>prix</th>
    <th>Quantite</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php  foreach($produits as $p) {?>
<tr>
    <td><?=$p['id']?></td>
    <td><?=$p['libelle']?></td>
    <td><?=$p['prix']?></td>
    <td><?=$p['qte']?></td>
    <td>
    <a href="delete.php?id=<?=$p['id']?>" class="btn btn-sm btn-danger">Supprimer</a>
    <a href="" class="btn btn-sm btn-warning">Modifier</a>
    <a href="" class="btn btn-sm btn-info">Consulter</a>
    </td>
</tr>

<?php } ?>
</tbody>
</table>

</div>
    
</body>
</html>