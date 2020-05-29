<?php 
include("modeles.php");
if(isset($_GET['motcle']) && !empty($_GET['motcle'])   ){
$produits=rechercher($_GET['motcle']);
}else{
    $produits=all();
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
    <title>nouveau produit</title>
    <?php include("_css.php");?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body  >
<?php include_once("_menu.php");?>
<div class="container">
<a href="create.php" class="btn btn-primary float-right my-3">Nouveau</a>

<form action="index.php" method="get">
Mot clé : <input type="text" name="motcle" autocomplete="off" value="<?php 

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
        <th>Libelle</th>
        <th>Prix</th>
        <th>Place</th>
        <th>Categorie</th>
        <th>Actions</th></tr>
    </thead>
    <tbody>
       <?php foreach($produits as $p) {?>
       <tr> <td><?=$p['id']?></td>
       <td><img src="<?=$p['photo']?>" width="100"></td>
        <td><?=$p['libelle']?></td>
        <td><?=$p['prix']?></td>
        <td><?=$p['place']?></td>
        <td><?php 
        
        
        $id=$p['categorie_id'];
       $categorie= find($id,"categorie");
    
        
        
        
        
        ?>
        
        <img src="<?=$categorie['photo']?>" width="50"> <br>
        <?=$categorie['nom']?>
        
        
        </td>
        <td>    <a onclick="return confirm('supprimer?')"  href="delete.php?id=<?=$p['id']?>" class="btn btn-sm btn-danger">Supprimer</a>

        <a href="edit.php?id=<?=$p['id']?>" class="btn btn-sm btn-warning">Modifier</a>
        <a href="show.php?ounacer=<?=$p['id']?>" class="btn btn-sm btn-info">Consulter</a></td></tr>
       <?php } ?>

    </tbody>
    
    </table>

<hr>

<div class="row">
<?php foreach($produits as $p) {?>

    <div class="col-md-3 text-center shadow">
            <img src="<?=$p['photo']?>" class="img-fluid " >
            <h4><?=$p['libelle']?></h4>        
            <h4><?=$p['prix']?>DHS</h4>
            <a href="show.php?ounacer=<?=$p['id']?>" class="btn btn-primary btn-sm">DETAILS</a>        
    </div>

<?php } ?>
</div>
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
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        }
    } 


    );
} );
  
  </script>
</body>
</html>