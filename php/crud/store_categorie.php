<?php 
    include("modeles.php");
    $nom= $_POST['nom'];
  
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
    ajouter_categorie($nom,$chemin);
    //redirection vers indeex.php
//header("location:index_categorie.php");
?>