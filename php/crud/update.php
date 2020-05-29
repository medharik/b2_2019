<?php 
include("modeles.php");
// $libelle=$_POST['libelle'];
// $prix=$_POST['prix'];
// $id=$_POST['id'];
extract($_POST);
modifier($libelle, $prix,$id,"",$place);
header("location:index.php?op=upd");
?>