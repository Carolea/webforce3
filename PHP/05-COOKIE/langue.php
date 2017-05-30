<?php
//-----------
//COOKIE
//-----------

//Un cookie ne peut pas dépasser 4 Ko
//Un client ne peut pas avoir plus de 300 cookies sur son disque
//Un serveur ne peut créer que 20 cookies maximum chez le client

/*
Définition: Un cookie est un petit fichier (4ko max) déposé par le serveur du site dans le navigateur de l'internaute et qui peut contenir des informations. Les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par les cookies.

PHP permet de récupérer très facilement les données contenu dans un cookie. Ces informations sont récupérées dans la superglobale (donc array) $_COOKIE.

Précaution à prendre avec les cookies: étant sauvegardé sur le poste de l'internaute, un cookie peut être potentiellement détourné ou volé. On n'y stocke donc pas par précautions des données sensibles (mdp, ref bancaires, panier d'achat //sauf fb qui stocke les mdp :D).

*/

//Application pratique: nous allons stocker la langue choisie par l'internaute dans un cookie afin de lui afficher le site dans cette langue à chaque visite:

//On détermine une variable $langue

if(isset($_GET['langue'])){
    //si on a cliqué sur un des liens:
    $langue = $_GET['langue'];
} elseif(isset($_COOKIE['langue'])){
    //si on a reçu un cookie appelé langue
    $langue = $_COOKIE['langue'];
} else {
    //par défaut, la langue est le français
    $langue = 'fr';
}

//Création du cookie: (durée limitée à 13mois.)
$un_an = 365 * 24 * 3600; // variable qui represente un an exprimé en secondes.
setCookie('langue', $langue, time() + $un_an) //envoie un cookie dans le navigateur de l'internaute : setCookie ('nom', 'valeur:contenu', 'date d'expiration en timestamp')

//Affichage de la langue
    
echo 'Langue: ';
switch ($langue){
    case 'fr': echo 'francais'; break;
    case 'es': echo 'espagnol'; break;
    case 'it': echo 'italien'; break;
    case 'en': echo 'anglais'; break;
}

//default pas obligé vu que déjà prévu en fr
//parametre/parametres avancés/confidentialité/parametre de contenu/cookie et données de sites =chrome
//option/vie privée/supp les cookies spécifiques =mozilla
//on ne peut pas supprimer le cookie chez le client mais on peut le rendre inactif en mettant une date passée ou à 0. Le cookie se renouvelant a chq passage sur le site.


//---------HTML------------
?>
<h1>Votre langue: </h1>
<ul>
    <li><a href="?langue=fr">Français</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=it">Italien</a></li>
    <li><a href="?langue=en">Anglais</a></li>
</ul>

