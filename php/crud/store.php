<?php 
    include("modeles.php");
    // $libelle= $_POST['libelle'];
    // $prix= $_POST['prix'];
    extract($_POST);// $libelle, $prix
    ajouter($libelle,$prix);
    //redirection vers indeex.php
header("location:index.php");
?>