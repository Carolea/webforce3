<?php

//--------------------
//Exercice
//--------------------

/*
-Réaliser un formulaire 'pseudo' et 'email' dans formulaire3.php
-Récupérer les données saisies dans le formulaire dans la page formulaire4.php et les afficher.

-De plus si le champs pseudo est laissé vide afficher un message dans formulaire4.php qui précise que le champs est obligatoire
*/

echo '<pre>'; var_dump($_POST); echo '<pre>';

if(!empty($_POST)){
    //si le pseudo est vide
if(empty($_POST['pseudo'])){
    echo 'Ce champ est obligatoire '; 
    
} else{
    //si le pseudo n'est pas vide:
echo 'Pseudo: ' . $_POST['pseudo'] . '<br>';
echo 'Email: ' . $_POST['email'] . '<br>';
}
    //Demain, il y aura le traitement en base de donnée ici.
    
}

