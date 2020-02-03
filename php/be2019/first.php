<?php 

$prenom="ALI";
$age=30;
$taille=2;
$hf="homme";
if ($age>18) {
    $m="Majeur";
} else {
$m="Mineur";
}

if($hf=="homme"){
$couleur="#0F0";
}
if($hf=="femme"){
    $couleur="#F00";

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="color:<?php echo $couleur;?>;">
    <h1>Bienvenue <?php echo $prenom;  ?></h1>
    <p>
    age est <?php echo $age; ?> , la taille est de : <?php echo $taille;?>
    </p>
    <h4>Vous etes : <?php  echo $m;?></h4>
</body>
</html>