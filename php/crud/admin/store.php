<?php
include("../modeles.php");

extract($_POST);

$user = existe("login", $login, "users");
// var_dump($user);
// die();
if (!empty($user)) {

    header("location:index.php?op=existe");
    die();
}
//extract($_POST);// $libelle, $prix
// $chemin=uploader($infos);
// echo " fichier charger vers le chemin suivant $chemin";

ajouter_user($login, $passe, $pseudo, $role, $email);
//redirection vers indeex.php
header("location:index.php?op=store");
