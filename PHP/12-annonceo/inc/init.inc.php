<?php
/*
Le fichier init.inc.php sera inclus dans tous les scripts (hors les fichiers .inc eux-mêmes) pour initialiser les éléments suivants:

- connexion à la BDD
- création ou ouverture de session
- définir le chemin du site
- inclure le fichier fonction.inc.php

*/

// Connexion à la BDD:
$pdo = new PDO('mysql:host=localhost;dbname=annonceo', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Session:
session_start(); //crée ou ouvre une session sur le serveur

// Définition du chemin du site
define('RACINE_SITE', '/webforce3/PHP/12-annonceo/'); //indique le dossier dans lequel se trouve les sources du site sns 'localhost'. La constante s'écrit en majuscule.

//Variables d'affichage de contenus:
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

//Inclusion des fonctions:
require_once('fonction.inc.php'); //on inclu ce fichier ici, ainsi il sera automatiquement inclus dans tous les scripts du site