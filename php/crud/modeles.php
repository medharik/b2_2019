<?php
// les fonctions CRUD
// functions (sous programmes )  : 
// connecter_db

function connecter_db(){

    $link = new PDO('mysql:host=localhost;dbname=bestdb2020', "root", "");
    return $link;
}

// ajout : ajoute  les datas d'un produit dans la bd en lui donnant : libelle , prix
function ajouter($libelle,$prix){
//connexion db
$link=connecter_db();
//preparer une requete SQL
$rp= $link->prepare("insert into produit (libelle, prix ) values (?,?)");
//execution de la requete sur la connexion
$rp->execute([$libelle,$prix]);

}



// suppression


// affichage (liste ou lecture (read) )

//modifier





