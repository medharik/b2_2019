
<?php
// les fonctions CRUD
// functions (sous programmes )  : 
// connecter_db
define('MAX_SIZE', 8 * 1024 * 1024);
function connecter_db()
{

    // silent_mode , warning_mode , exception_model

    $link = new PDO('mysql:host=localhost;dbname=bestdb2020', "root", "");
    // pour activer la gestion des erreurs par try catch
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $link;
}
// produit
// ajout : ajoute  les datas d'un produit dans la bd en lui donnant : libelle , prix, photo
function ajouter($libelle, $prix, $photo, $categorie_id, $place = "")
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("insert into produit (libelle, prix, photo,categorie_id ,place )
         values (?,?,?,?,?)");
        //execution de la requete sur la connexion
        $rp->execute([$libelle, $prix, $photo, $categorie_id, $place]);
    } catch (PDOException $e) {
        echo "une erreur d'ajout " . $e->getMessage();
    }
}


//modifier produit
function modifier($libelle, $prix, $id, $photo = "", $place = "")
{
    try {
        //connexion db
        $link = connecter_db();
        if (empty($photo)) {
            //preparer une requete SQL
            $rp = $link->prepare("update produit set libelle=? , prix=?, place=? where id= ? ");
            //execution de la requete sur la connexion
            $rp->execute([$libelle, $prix, $place, $id]);
        } else {
            //preparer une requete SQL
            $rp = $link->prepare("update produit set libelle=? , prix=?, place=? , photo=? where id= ? ");
            //execution de la requete sur la connexion
            $rp->execute([$libelle, $prix, $place, $photo, $id]);
        }
    } catch (PDOException $e) {
        echo "une erreur de modification " . $e->getMessage();
    }
}

// Categorie 
function ajouter_categorie($nom, $photo)
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("insert into categorie (nom, photo ) values (?,?)");
        //execution de la requete sur la connexion
        $rp->execute([$nom, $photo]);
    } catch (PDOException $e) {
        echo "une erreur d'ajout de la categorie " . $e->getMessage();
    }
}
//user 
function ajouter_user($login, $passe, $pseudo, $role, $email)
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("insert into users (login, passe,pseudo,role,email ) 
        values (?,?,?,?,?)");
        //execution de la requete sur la connexion
        $rp->execute([$login, $passe, $pseudo, $role, $email]);
    } catch (PDOException $e) {
        echo "une erreur d'ajout d'utilisateur " . $e->getMessage();
    }
}

// fonction qui recoit un login et verifie d'existe deja ds la bd
function existe($attribut, $valeur, $table)
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("select * from $table where $attribut=?");
        //execution de la requete sur la connexion
        $rp->execute([$valeur]);
        $resultat = $rp->fetch();
        return $resultat;
        // if (!empty($resultat)) {
        //     return false;
        // } else {
        //     return true;
        // }
    } catch (PDOException $e) {
        echo "une erreur de verification de login " . $e->getMessage();
    }
}

//modifier
function modifier_categorie($nom, $id)
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("update categorie set nom=?   where id= ? ");
        //execution de la requete sur la connexion
        $rp->execute([$nom, $id]);
    } catch (PDOException $e) {
        echo "une erreur de modification de la categorie " . $e->getMessage();
    }
}

// fin categorie 

// suppression

function supprimer($id, $table = "produit")
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("delete from  $table where id=?");
        //execution de la requete sur la connexion
        $rp->execute([$id]);
    } catch (PDOException $e) {
        echo "une erreur de suppression de $table " . $e->getMessage();
    }
}

// all("categorie")
// all() => table produit (par default)
// affichage (liste ou lecture (read) )
function all($table = "produit")
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("select * from $table ");
        //execution de la requete sur la connexion

        $rp->execute([]);
        $resultat = $rp->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "une erreur de selection  " . $e->getMessage();
    }
}


// trouver par 
function findBy($table = "produit", $condition, $limit = "")
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("select * from $table where $condition order by id desc $limit");
        //execution de la requete sur la connexion

        $rp->execute([]);
        $resultat = $rp->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "une erreur de selection  " . $e->getMessage();
    }
}
// recuperer une ressource  par son id
function find($id, $table = "produit")
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("select * from $table where id=? ");
        //execution de la requete sur la connexion
        $rp->execute([$id]);
        $resultat = $rp->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $x) {
        echo "une erreur de selection  par id = $id : " . $x->getMessage();
    }
}






// televersement = upload d'un fichier
// infos sur fichier : array( name=> 'a.png' , tmp_name  , size , error, type
function uploader($infos)
{
    $name = $infos['name'];
    $tmp = $infos['tmp_name'];
    $taille = filesize($tmp); // calcul la taille du fichier en octect
    $file_info =  pathinfo($name);
    $extension = strtolower($file_info['extension']); //PNG=>png
    $autorise = ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'ico'];

    $new_name = md5(time() . random_int(0, 9999999) . $name); //a569fmdklsdjfkddsmddlsdkl

    $chemin = "images/$new_name.$extension"; //images/a.png

    //varification de la taille 
    if ($taille > MAX_SIZE) {
        //   header("location:create.php?err=size");
        //   exit();
        return "la taille du fichier ne doit pas depassee " . MAX_SIZE / (1024 * 1024) . 'Mo';
    }
    // verification dy type 
    else if (!in_array($extension, $autorise)) {

        return  "Ce n'est pas une image";

        //AUTRE probeleme  d'upload
    } else if (!move_uploaded_file($tmp, $chemin)) {
        return "une erreur est survenue lors du chargement du fichier";
    } else {



        return $chemin;
    }
}


// recherche d'un produit
function    rechercher($motcle)
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("select * from produit where libelle like ? or prix like ?  ");

        //execution de la requete sur la connexion

        $rp->execute(["%$motcle%", "%$motcle%"]);
        $resultat = $rp->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "une erreur de selection " . $e->getMessage();
    }
}
// recherche d'une categorie
function    rechercher_categorie($motcle)
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("select * from categorie where nom like ? ");

        //execution de la requete sur la connexion

        $rp->execute(["%$motcle%"]);
        $resultat = $rp->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "une erreur de selection " . $e->getMessage();
    }
}

// fin recherche 

//Exemple de  jointure interne
//  select employees.first_name , employees.last_name , jobs.job_title from employees join jobs on jobs.job_id = employees.job_id  
// where jobs.job_title like 'Programmer'
// select catalogue .*, clients.nom , clients.prenom 
// from clients join commandes on clients.num_client = commandes.cli_com
// join detail_commandes d on num_com=com_det
// join catalogue on ref_det =code_article
// where clients.nom ='benito' 



function jointure_produit_commande()
{
    try {
        //connexion db
        $link = connecter_db();
        //preparer une requete SQL
        $rp = $link->prepare("select produit.*, categorie.nom , categorie.photo as photo_categorie , categorie.id as categorie_id 
        from produit join  categorie on categorie.id=produit.categorie_id  ");
        //execution de la requete sur la connexion

        $rp->execute([]);
        $resultat = $rp->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "une erreur de selection  " . $e->getMessage();
    }
}
//exemple de jointure interne  entre table 
    // select employees.first_name , employees.last_name , jobs.job_title from employees join jobs on jobs.job_id = employees.job_id  
    // where jobs.job_title like 'Programmer'
