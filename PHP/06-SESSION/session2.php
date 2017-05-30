<?php

//Ouverture de la session en cours:

session_start();

echo 'La session est accessible dans tous les scripts du site, comme ici';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

//phpsessid en recherche sur le navigateur
//Lorsque j'effectue un session_start, la session n'est pas recréé car elle existe déjà. Elle a été créé dans le fichier session1.php. En conclusion ce fichier n'a pas de lien avec session1.php, il n'y a pas d'inclusion, il pourrait être dans n'importe quel dossier du site, s'appeler n'importe comment et pourtant les informationsdu fichier de session reste accessibles, grâce à session_start.