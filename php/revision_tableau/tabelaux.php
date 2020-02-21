<?php 
$p1=['libelle'=>'hp dv 6','prix'=>7000,'qte'=>30,'images'=>['i1.png','i2.jpg']];
$p2=['libelle'=>'dell satelite ','prix'=>6000,'qte'=>4];
$p3=['libelle'=>'sony vaio  ','prix'=>9000,'qte'=>11,'images'=>['i3.png','i4.png','i5.png']];
$stock =[$p1,$p2,$p3];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listes des produits</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="container">
<table class="table" id="t">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Libelle</th>
      <th scope="col">prix</th>
      <th scope="col">Qte</th>
      <th scope="col">Images</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($stock as $produit) {?>
    <tr>
      <th scope="row"><?=$produit['libelle']?></th>
      <td><?=$produit['prix']?></td>

      <td>
      <?php
      if($produit['qte']<10){
          $classe="danger";
        }else if($produit['qte']<20){
            $classe="warning";
            
        }else{
            $classe="info";
            
      }
      
      ?>
     <span class="badge badge-<?=$classe?>"> <?=$produit['qte']?></span>
      
      </td>
      <td>
    il y a <?php if(isset($produit['images'])) echo count($produit['images'])?>
      
      <?php 
      if(isset($produit['images']))  {

      foreach($produit['images'] as $image){
      ?>
      <img src="images/<?=$image?>" width="100">


      <?php } } else {  ?>
Aucune image pour ce produit

      <?php } ?>
  

      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
</script>
</body>
</html>