<?php 
    include("modeles.php");
   // $libelle= $_POST['libelle'];
    // $prix= $_POST['prix'];
    // $categorie_id= $_POST['categorie_id'];
    // $place= $_POST['place']; 

    extract($_POST);
$infos=$_FILES['photo'];// name , tmp_name,size, error, type
  $chemin= uploader($infos);
 $x= strpos($chemin, 'images/');// false si introuvable
 // 0, 0.0, false , null, array() 
if($x===false){//  le chemin n'as de images/
die($chemin);
}

 
    //extract($_POST);// $libelle, $prix
    // $chemin=uploader($infos);
    // echo " fichier charger vers le chemin suivant $chemin";
    ajouter($libelle,$prix,$chemin,$categorie_id,$place);
    //redirection vers indeex.php
header("location:index.php");
?>