<?php

//-------------
//Exercice
//-------------
/*
Dans listeFruits.php : créer 3 liens banane, kiwi et cerise

Passer le fruit dans l'url en GET à la page couleur.php

Dans couleur.php : récupérez le fruit dans l'url et afficher sa couleur avec une phrase du type "La couleur des bananes est jaune".

Penser à se prémunir des tentatives d'accès direct à la page couleur.php par une condition.
*/

echo '<pre>'; var_dump($_GET); echo '<pre>'; //pour vérifier que je reçois qq chose dans l'url.




if(isset($_GET['fruit'])){
    //si l'indice fruit existe, c'est qu'il est dans l'url
    if($_GET['fruit'] == 'banane'){   
        echo "<p>La " . $_GET['fruit'] . " est jaune<p>";
        
    } elseif($_GET['fruit'] == 'kiwi'){       
        echo "<p>Le " . $_GET['fruit'] . " est vert<p>";
        
    } elseif($_GET['fruit'] == 'cerise'){
        echo "<p>La " . $_GET['fruit'] . " est rouge<p>";
        
} else {
    echo '<p>Pas de fruit sélectionné<p>';   
}
}

//if(isset($_GET['article] == 'banane'))  impossible car isset renvoi un true or false qui ne sera jamais possible avec == 'banane'

//alt//if($_GET['fruit'] == 'banane'){   
//        echo "<p>"La couleur de la banane est jaune<p>";
