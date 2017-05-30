<?php
//---------------------------
//PDO
//---------------------------

//L'extension PDO, pour PHP Data Objects, définit une interface pour accéder à une base de données depuis PHP.

//-----------------------------------
echo '<h3>01. PDO : Connexion<h3>';
//-----------------------------------

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//connection à la bdd

//$pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la base de données.

//Les arguments : 1 driver mysql + serveur + base de données - 2 pseudo - 3 mdp - 4 option 1 pour générer l'affichage des erreurs, option 2 définie le jeu de caractères des échanges avec la bdd.


//constante(attr_errmode) de classe (pdo) toujours avec double :
//PDO::ATTR_ERRMODE affiche les erreurs dans le navigateur.


echo '<pre>'; print_r($pdo); echo '</pre>'; //on voit qu'il s'agit d'un objet issu de la classe pdo.

echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>'; //affiche les méthodes de l'objet issu de la classe PDO

/*PDO Object
(
)
Array
(
    [0] => __construct
    [1] => prepare
    [2] => beginTransaction
    [3] => commit
    [4] => rollBack
    [5] => inTransaction
    [6] => setAttribute
    [7] => exec
    [8] => query
    [9] => lastInsertId
    [10] => errorCode
    [11] => errorInfo
    [12] => getAttribute
    [13] => quote
    [14] => __wakeup
    [15] => __sleep
    [16] => getAvailableDrivers
)*/

//------------------------------------------------------
echo '<h3>02. exec avec INSERT,UPDATE et DELETE </h3>';
//------------------------------------------------------

/*$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('test', 'test', 'm', 'test', '2016-02-08', 500)");*/

/*exec() est utilisé pour la formulation de requêtes ne retournant pas de jeu de résultats (ex SELECT * FROM) : INSERT, UPDATE et DELETE

Valeur de retour:
    Succès: un integer (=le nombre de lignes affectées)
    Echec : false


*/

/*echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
echo "Dernier id généré lors de l'INSERT: " . $pdo->lastInsertId();*/

//j'appelle la methode exec de pdo
//requete d'insertion sql. Pas de quotes sur les champs de la table employes
//insert update delete pure sql entre les ""

//------------------
//Exemple avec UPDATE:
$resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes =350");


echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";

//exec juste quand y'a pas un retour de sélection

//------------------------------------------------------
echo '<h3>03. query avec SELECT + FETCH_ASSOC </h3>';
//------------------------------------------------------

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");

//daniel = varchar donc quote

/*
Au contraire d'exec(), query() est utilisé avec les requêtes retournant un ou plusieurs résultats : SELECT.

    Valeur de retour:
        Succès : on obtient un nouvel objet issu de la classe préféfinie PDOstatement
        Echec  : false

query peut être utilisé avec insert/update et delete

*/

//utilisé au sein de statement
//insert update delete aussi utilisable en query 

echo '<pre>'; print_r($result); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>';


/*PDOStatement Object
(
    [queryString] => SELECT * FROM employes WHERE prenom = 'daniel'
)
Array
(
    [0] => execute
    [1] => fetch
    [2] => bindParam
    [3] => bindColumn
    [4] => bindValue
    [5] => rowCount
    [6] => fetchColumn
    [7] => fetchAll
    [8] => fetchObject
    [9] => errorCode
    [10] => errorInfo
    [11] => setAttribute
    [12] => getAttribute
    [13] => columnCount
    [14] => getColumnMeta
    [15] => setFetchMode
    [16] => nextRowset
    [17] => closeCursor
    [18] => debugDumpParams
    [19] => __wakeup
    [20] => __sleep
)*/












