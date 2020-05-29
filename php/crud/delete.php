<?php 
include("modeles.php");
$id=$_GET['id'];//delete.php?id=1
// supprimer le produit ayant cet ID depuis la base de donnees
// en appelant le programme (fonction ) qui fait cette tache 
supprimer($id);
header("location:index.php?op=del");

?>