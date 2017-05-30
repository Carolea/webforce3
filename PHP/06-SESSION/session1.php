<?php
//-----------
//SESSION
//-----------

/*
Principe : Un fichier temporaire appelé session est créé sur le serveur, avec un identifiant unique. Cette session est liée à un internaute car, dans le même temps, un cookie est déposé dans le navigateur de l'internaute avec l'identifiant. Ce cookie devient inactif lorsqu'on quitte le navigateur : la session s'interrompt alors.

Le fichier de session peut contenir toute sorte d'informations, y compris sensibles, car il n'est pas accessible par l'internaute. On y stocke donc par exemple des logins de connexion, des paniers d'achat, etc...

Si l'internaute modifie le cookie relatif à une session, le lien avec celle-ci est rompu et l'internaute est déconnecté.

On récupère les données de la session dans la superglobale $_SESSION.
*/

//Création ou ouverturre d'une session:
session_start(); //permet de créer un fichier de session sur le serveur ou de l'ouvrir si il existe déjà.

//Remplissage de la session
$_SESSION['pseudo'] = 'tintin';
$_SESSION['mdp'] = 'milou'; //$_SESSION étant un array, il se rempli comme tous les tableaux en mettant un indice entre [] et en lui affectant une valeur.

echo '1- La session après remplissage: ';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; //affiche les informations contenus dans la session. Le fichier se trouve sur xammp/tmp

//Vider une partie de la session:
unset($_SESSION['mdp']); //nous pouvons vider une partie de la sesison avec unset.

echo '2- La session après suppression du mdp: ';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; 

//Supprimer entièrement la session:
//session_destroy(); //supprime toute la session. On le passe en commentaire pour la suite dans session2

echo '3- La session après session_destroy(): ';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

//la suppression se fait a la fin du script donc on voit encore la session. On voit encore la session à cet endroit car le session destroy a la particularité de n'être executé qu'à la fin du script, c'est à dire après ce print_r.
