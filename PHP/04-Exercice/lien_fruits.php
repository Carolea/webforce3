<?php

//Exercice : 
/*
-Faire 4 liens html avec le nom des fruits (cerises, bananes, pommes, pêches)
-Quand on clique sur un lien, on affiche le prix du fruit choisi pour 1000g (dans la page liens_fruits.php).

-Remarque: utilisez la fonction calcul() pour obtenir le prix total!
*/
echo '<pre>'; var_dump($_GET); echo '<pre>';

include 'fonction.inc.php';

if(isset($_GET['fruit'])) echo calcul($_GET['fruit'], 1000);

/*Quand la condition et le resultat sont simples on peut omettre les {} av/ap echo calcul*/

/*Par convention l'écho devrait se trouver av ou apres le h1 avec un appel de fonction de l'echo calcul*/

/*
function calcul($fruit, $poids){
    
    switch($fruit){
        case 'cerises' : $prix_kg = 5.76; break;
        case 'bananes' : $prix_kg = 1.09; break;
        case 'pommes'  : $prix_kg = 1.61; break;
        case 'peches'  : $prix_kg = 3.23; break;
        default        : return 'fruit inexistant';
    
    }
    
    $resultat = $poids * $prix_kg;  
    return "Les $fruit coûtent $resultat euros pour $poids grammes";
    
    echo calcul($fruit, 1000);
}
*/




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fruits</title>
</head>
<body>
    <h1>Nos Fruits</h1>
    <a href="lien_fruits.php?fruit=cerises">Cerises</a>
    <br>
    <a href="lien_fruits.php?fruit=bananes">Bananes</a>
    <br>
    <a href="lien_fruits.php?fruit=pommes">Pommes</a>
    <br>
    <a href="lien_fruits.php?fruit=peches">Pêches</a>
    
<!--si la requête du GET se fait sur la même page on peut abréger en "?fruit=cerises"-->


</body>
</html>





