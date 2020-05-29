<?php 
include("functions.php");
// recuperer les data depuis le forms
$libelle=$_POST['libelle'];
$prix=$_POST['prix'];
$qte=$_POST['qte'];

// appeler ajouter_produit
ajouter_produit($libelle , $prix,$qte);
//rediirection vers la page : index.php
// header("location:index.php");
?>