<h1>Page détail des articles</h1>


<?php
//-----------------------
// La superglobale $_GET
//-----------------------
//$_GET représente l'URL : il s'agit d'une superglobale et comme toutes les superglobales il s'agit d'un array.

//Superglobale signifie que cette variable est disponible dans tous les contextes du script, y compris dans les fonctions et qu'il n'est pas nécessaire de faire global $_GET.

//Les informations transitent dans l'url de la manière suivante: ?indice=valeur&indice2=valeur2

//La superglobale $_GET transforme ces informations passées dans l'URL en cet array : $_GET = array('indice' => 'valeur', 'indice2'  => 'valeur2')


echo '<pre>'; var_dump($_GET); echo '<pre>';

//pour afficher le contenu de GET. En cliquant sur un lien de la page1 qui amène sur l'array de la page2 affiché par le var_dump.

//On met une condition qui vérifie qu'on a bien les infos dans l'URL:
if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])){
    //si les indices 'article' 'couleur' 'prix' existent je les affiche
echo "<p>Article: " . $_GET['article'] . "<p>";
echo "<p>Couleur: " . $_GET['couleur'] . "<p>";
echo "<p>Prix: " . $_GET['prix'] . "<p>";
} else {
    echo '<p>Ce produit n\'existe pas<p>';
    
}


