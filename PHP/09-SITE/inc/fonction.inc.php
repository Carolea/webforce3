<?php

function debug($var){
    echo '<div style="background: orange; padding: 5px;">';
    echo '<pre>'; print_r($var); echo '</pre>';
    
    echo '</div>';
}


//----------Fonctions membre-----------
function internauteEstConnecte(){ //dans la pratique nom de fonction plus court et en anglais.
    if(isset($_SESSION['membre'])){
        // Si existe l'indice membre dans $_SESSION, c'est que le membre est passé par le formulaire de connexion avec les bons pseudo/mdp:
        return true;
    } else {
        return false;
    }
}

/*return (isset($_SESSION['membre']));  format plus rapide mettre directement sous le function*/

//----------Fonctions admin-----------
function internauteEstConnecteEtEstAdmin(){
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) {
        //si l'internaute est connecté ET que son statut vaut 1, alors il est ADMIN:
        return true;
    } else {
        return false;
    }
}

/* ou return(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1)*/

//------------------------------------
function executeRequete($req, $param = array()){
    if(!empty($param)){
        //si j'ai reçu des valeurs associées aux marqueurs, je fais un htmlspecialchars dessus pour les échapper:
        foreach($param as $indice => $valeur){
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
            //évite les injections XSS et CSS en neutralisant les caractères < > "" '' &
            
            //exprime : executeRequete("SELECT *FROM produit WHERE id_produit =: id_produit", array('id_produit => $_GET['id_produit']));
        }
    }

global $pdo; //permet d'avoir accès à la variable définie dans l'espace global (dans init.inc.php)

$r = $pdo->prepare($req); //on prepare la requête reçue en argument

$succes = $r->execute($param); //on exécute la requête en lui passant les paramètres contenu dans $param

if(!$succes){
    //si la requete n'a pas fonctionné, execute renvoi false
    die('Erreur sur la requête');
}

return $r; //on retourne un objet issu de la classe pdoStatement
}
















