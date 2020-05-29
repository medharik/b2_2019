<?php 
include("modeles.php");
if(isset($_GET['motcle']) && !empty($_GET['motcle'])   ){
$categories=rechercher_categorie($_GET['motcle']);
}else{
    $categories=all("categorie");
}


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
    <title>nouveau categorie</title>
    <?php include("_css.php");?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body  >
<?php include_once("_menu.php");?>
<div class="container">
<a href="create.php" class="btn btn-primary float-right my-3">Nouveau</a>

<form action="index_categorie.php" method="get">
Mot clé : <input type="search" name="motcle" autocomplete="off"
 value="<?php 
if(isset($_GET['motcle']) && !empty($_GET['motcle'])   ){
echo $_GET['motcle']; 
}
?>">
<button class="btn btn-sm btn-primary">Recherche</button>
</form>

<div class="alert alert-info <?=$classe?>" style="clear:both"><?=$notice?></div>
    <table class="table table-striped" id="houcine">
    <thead>
     <tr>
     <th>#</th>
        <th>Photo</th>
        <th>Nom</th>
        <th>Actions</th></tr>
    </thead>
    <tbody>

       <?php foreach($categories as $p) {?>
       <tr> <td><?=$p['id']?></td>
       <td><img src="<?=$p['photo']?>" width="100"></td>
        <td><?=$p['nom']?></td>
        <td>    <a onclick="return confirm('Attention : la suppression d\'une categorie entraine la suppression en cascade de tous ses produits. Supprimer ?')"
          href="delete_categorie.php?id=<?=$p['id']?>" class="btn btn-sm btn-danger">Supprimer</a>
        <a href="edit_categorie.php?id=<?=$p['id']?>" class="btn btn-sm btn-warning">Modifier</a>
        <a href="show_categorie.php?ounacer=<?=$p['id']?>" class="btn btn-sm btn-info">Consulter</a></td></tr>
       <?php } ?>
    </tbody>
    
    </table>

<hr>


</div>

<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#houcine').DataTable(

        {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        }
    } 
     );
} );
////cdn.datatables.net/plug-ins/1.10.20/i18n/French.json
  </script>

</html>