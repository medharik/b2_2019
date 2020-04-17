<?php 
    include("modeles.php");
    $libelle= $_POST['libelle'];
    $prix= $_POST['prix'];
 
$infos=$_FILES['photo'];// name , tmp_name,size, error, type
  $chemin= uploader($infos);
    //extract($_POST);// $libelle, $prix
    // $chemin=uploader($infos);
    // echo " fichier charger vers le chemin suivant $chemin";
    ajouter($libelle,$prix,$chemin);
    //redirection vers indeex.php
header("location:index.php");
?>