<?php 
//fonction pour ce connecter a la bd
function connecter_db(){

    $link = new PDO('mysql:host=localhost;dbname=dbphppdo', 'root', '');
    return $link;
}

// fonction pour ajouter  un produit ds la bd
function ajouter_produit($libelle , $prix,$qte,$categorie_id){
try{
//connecter db
$link= connecter_db();
// preparer une requete (demande)
$rp=$link->prepare("insert into produit(libelle,prix,qte,categorie_id) values(?,?,?,?)");
//execute la requete 
$rp->execute([$libelle , $prix,$qte,$categorie_id]);

}catch(){

}
}

// fonction pour recuperer les donnees des produits depuis la base de donnees

function all(){
$link= connecter_db();
$rp=$link->prepare("select * from produit");
$rp->execute();
//extraire toutes des donnees ds une variable $resultat
$resultat=$rp->fetchAll();
return $resultat;
}




?>