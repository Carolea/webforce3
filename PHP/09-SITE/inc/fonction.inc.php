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


//---------------Fonctions liées au panier------------------

//On crée le panier VIDE : 
function creationDuPanier(){
    if(!isset($_SESSION['panier'])){
        //si le panier n'existe pas, on le crée:
        $_SESSION['panier'] = array();
        $_SESSION['panier']['titre'] = array();
        $_SESSION['panier']['id_produit'] = array();
        $_SESSION['panier']['quantite'] = array();
        $_SESSION['panier']['prix'] = array();
    }
}


//Fonction pour ajouter un produit au panier:
function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix){
    
    creationDuPanier();
    
    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); //retourne un chiffre si le produit existe, qui correspond à l'indice de celui-ci dans le panier, array_search retourne false.
    
    if($position_produit === false){
        //le produit n'est pas dans le panier on l'ajoute:
        $_SESSION['panier']['titre'][] = $titre; 
        $_SESSION['panier']['id_produit'][] = $id_produit; 
        $_SESSION['panier']['quantite'][] = $quantite; 
        $_SESSION['panier']['prix'][] = $prix;   //equivalent de push en js le [] pour ajouter à l'indice numérique suivant:  
    } else {
        //sinon on ajoute la nouvelle quantité à celle existante dans le panier:
        
        $_SESSION['panier']['quantite'][$position_produit] += $quantite;
        
    }
    
    
}

//calculer le montant total du panier:

function montantTotal(){
    $total = 0;
    
    //on parcourt le panier pour additionner les quantités fois les prix:
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
        $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
    }
    
    return round($total, 2); //arrondi $total à 2 décimales
}

//retirer un produit du panier:
function retirerProduit($id_produit){
    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); //retourne la position du produit dans le panier ou false si il n'y est pas.
    
    if($position_produit !== false){
        //debug($_SESSION);
            
        array_splice($_SESSION['panier']['titre'], $position_produit, 1);
        array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
        array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
        array_splice($_SESSION['panier']['prix'], $position_produit, 1); //coupe une tranche d'un array à partir de l'indice $position_produit et sur 1 indice
    }
}

//fonction comptant le nbr de produits différents dans le panier
function quantiteProduit(){
    if(isset($_SESSION['panier'])){
        //si existe le panier:
        return count($_SESSION['panier']['id_produit']);
    } else {
        return 0;
    }
}















