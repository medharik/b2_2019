<?php 
include("modeles.php");
$libelle=$_POST['libelle'];
$prix=$_POST['prix'];
$id=$_POST['id'];
modifier($libelle,$prix,$id);
header("location:index.php?op=upd");
?>