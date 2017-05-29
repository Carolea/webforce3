<?php
//Création d'une fonction qui retourne le prix d'un certain poid de fruits.

function calcul($fruit, $poids){
    
    switch($fruit){
        case 'cerises' : $prix_kg = 5.76; break;
        case 'bananes' : $prix_kg = 1.09; break;
        case 'pommes'  : $prix_kg = 1.61; break;
        case 'peches'  : $prix_kg = 3.23; break;
        default        : return 'fruit inexistant';
    
    }
    
    $resultat = $poids / 1000 * $prix_kg;  //prix en gramme a convertir en kg
    return "Les fruits $fruit coûtent $resultat euros pour $poids grammes";
    
}