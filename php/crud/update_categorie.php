<?php 
include("modeles.php");
// $nom=$_POST['nom'];
// $id=$_POST['id'];
extract($_POST);
modifier_categorie($nom,$id);
header("location:index_categorie.php?op=upd");
?>