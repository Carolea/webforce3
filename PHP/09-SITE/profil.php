<?php
require_once 'inc/init.inc.php';

////--------------TRAITEMENT--------------
//Redirection si visiteur non connecté:
if(!internauteEstConnecte()){
    header('location:connexion.php');
    exit();
}

//on prépare le profil à afficher, tout est dans la session
/*debug($_SESSION);*/

$contenu = '<h1>Bonjour ' . $_SESSION['membre']['pseudo'] . '</h1>' . '<br>' .
           '<p>Votre email ' . $_SESSION['membre']['email'] . '</p>' . 
           '<p>Votre adresse ' . $_SESSION['membre']['adresse'] . '</p>' . 
           '<p>Votre code postal ' . $_SESSION['membre']['code_postal'] . '</p>' . 
           '<p>Votre ville ' . $_SESSION['membre']['ville'] . '</p>';




////--------------AFFICHAGE---------------
require_once 'inc/haut.inc.php';

echo $contenu;

require_once 'inc/bas.inc.php';
