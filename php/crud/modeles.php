<?php
// les fonctions CRUD
// functions (sous programmes )  : 
// connecter_db

function connecter_db(){

    // silent_mode , warning_mode , exception_model

    $link = new PDO('mysql:host=localhost;dbname=bestdb2020', "root", "");
    // pour activer la gestion des erreurs par try catch
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $link;
}

// ajout : ajoute  les datas d'un produit dans la bd en lui donnant : libelle , prix
function ajouter($libelle,$prix){
    try{

        //connexion db
        $link=connecter_db();
        //preparer une requete SQL
        $rp= $link->prepare("insert into produit (libelle, prix ) values (?,?)");
        //execution de la requete sur la connexion
        $rp->execute([$libelle,$prix]);
}catch(PDOException $e){
    echo "une erreur d'ajout ".$e->getMessage();
}

}

// suppression
function supprimer($id){
try{
    //connexion db
    $link=connecter_db();
    //preparer une requete SQL
    $rp= $link->prepare("delete from  produit where id=?");
    //execution de la requete sur la connexion
    $rp->execute([$id]);
}catch(PDOException $e){
    echo "une erreur de suppression ".$e->getMessage();
}
}



// affichage (liste ou lecture (read) )
function all(){
    try{
        //connexion db
        $link=connecter_db();
        //preparer une requete SQL
        $rp= $link->prepare("select * from produit ");
        //execution de la requete sur la connexion

        $rp->execute([]);
        $resultat=$rp->fetchAll(PDO::FETCH_ASSOC);

return $resultat;
    }catch(PDOException $e){
        echo "une erreur de selection ".$e->getMessage();
    }
    }
    // recuperer une ressource  par son id
    function find($id){
        try{
            //connexion db
            $link=connecter_db();
            //preparer une requete SQL
            $rp= $link->prepare("select * from produit where id=? ");
            //execution de la requete sur la connexion
    
            $rp->execute([$id]);
            $resultat=$rp->fetch(PDO::FETCH_ASSOC);
    
    return $resultat;
        }catch(PDOException $x){
            echo "une erreur de selection  par id = $id : ".$x->getMessage();
        }
        }


//modifier
function modifier($libelle, $prix,$id){
    try{
        //connexion db
        $link=connecter_db();
        //preparer une requete SQL
        $rp= $link->prepare("update produit set libelle=? , prix=? where id= ? ");
        //execution de la requete sur la connexion
        $rp->execute([$libelle, $prix,$id]);
    }catch(PDOException $e){
        echo "une erreur de modification ".$e->getMessage();
    }
    }



