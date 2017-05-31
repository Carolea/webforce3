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

echo '<pre>'; print_r($result); echo '</pre>'; //affiche les propriétés de l'objet PDOStatement
echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>'; //affiche les méthodes issues de PDOStatement

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


//$result est le résultat de la requête sous une forme inexploitable directement. Il faut donc le transformer par la méthode fetch(): 

$result = $pdo->query("SELECT * FROM employes WHERE prenom ='thomas'");

$employe = $result->fetch(PDO::FETCH_ASSOC);
//La méthode fetch() avec le parametre PDO::FETCH_ASSOC permet de transformer l'objet $result en un ARRAY associatif ($employe) indexé avec le nom des champs de la requête

echo '<pre>'; print_r($employe); echo '</pre>';

echo "Je suis $employe[prenom] $employe[nom] du service $employe[service] <br>"; 
//on peut afficher le contenu de l'array avec des crochets. Ici notre array est dans des guillemets donc pas besoin des quotes autour des indices

//On peut transformer $result selon l'une des autres méthodes suivantes:

$result = $pdo->query("SELECT * FROM employes WHERE prenom ='thomas'");
$employe = $result->fetch(PDO::FETCH_NUM); //on obtient un array indexé numériquement

echo '<pre>'; print_r($employe); echo '</pre>';
echo $employe[1] . '<br>';
//on affiche le prénom en passant par l'indice 1 correspondant

$result = $pdo->query("SELECT * FROM employes WHERE prenom ='thomas'");
$employe = $result->fetch();
echo '<pre>'; print_r($employe); echo '</pre>';
echo $employe['prenom'] . '<br>';
echo $employe[1] . '<br>';

//le fetch sans argument donne un mélange de FETCH_NUM et FETCH_ACCOC

//---
$result = $pdo->query("SELECT * FROM employes WHERE prenom ='thomas'");
$employe = $result->fetch(PDO::FETCH_OBJ); //retourne un objet avec le nom des champs de la requête comme propriétés (=attributs) publiques.
echo '<pre>'; print_r($employe); echo '</pre>';
echo $employe->prenom . '<br>'; //comme $employe est un objet, on utilise la notation avec flèche ->

//Remarque : Il faut choisir l'un des traitements que vous voulez effectuer, car on ne peut pas faire 2 fetch successifs sur un même résultat (donc remettre le $result=)


echo '<hr>';

//--------------
//Exercice: Afficher le service de l'employé dont l'id_employes est 417

$result = $pdo->query("SELECT * FROM employes WHERE id_employes = 417");

$employe = $result->fetch(PDO::FETCH_ASSOC);

echo $employe['service'] . '<br>';


//------------------------------------------------------
echo '<h3>04. while et FETCH_ASSOC </h3>';
//------------------------------------------------------

//Jusqu'ici, il n'y'avait qu'un seul objet PDOStatement issu de la requête. Pour traiter plusieurs résultats, il nous faut faire une boucle while.

$resultat = $pdo->query("SELECT * FROM employes");

echo 'Nombre d\'employés dans la requête : ' . $resultat->rowCount() . '<br>';
//pour compter le nbr de ligne dans la requête

while($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){ //fetch retourne la ligne suivante du jeu de résultat contenu dans $resultat en un array associatif. La boucle while permet de parcourir tous les résultats en faisant avancer le curseur dans la table. La boucle s'arrête à la fin des résultats.
    echo '<pre>'; print_r($contenu); echo '</pre>';
//passer d'un objet(resultat) à un array(contenu). Si on vire le while il n'affiche que le 1er résultat et si on ne met pas de contenu, on fetch sur l'objet $resultat mais rien pour recevoir les données.

echo '<div>';
    echo $contenu['id_employes'] . '<br>';
    echo $contenu['prenom'] . '<br>';
    echo $contenu['service'] . '<br>';
echo '-----------------</div>';
    
}

//Remarque il n'y a pas un seul array avec tous les enregistrements mais un array par employé!!!

//Quand vous avez potentiellement plusieurs résultats : vous faites une boucle while sinon, vous faites un seul fetch.

//------------------------------------------------------
echo '<h3>05. fetchAll </h3>';
//------------------------------------------------------

$resultat = $pdo->query("SELECT * FROM employes");

$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>'; print_r($donnees); echo '</pre>';

//fetchAll retourne toutes les lignes de résultats dans un tableau multidimensionnel : on a 1 array associatif à chq indice numérique représentant un employé. (marche aussi avec PDO::FETCH_NUM)

//pour afficher tout le contenu de cet array multidimensionnel, nous faisons des boucles foreach imbriquées:
echo '<hr>';

foreach($donnees as $employe){ //$employe est un sous array associatif contenant les infos de l'employé
   /*echo '<pre>'; print_r($employe); echo '</pre>';*/
    foreach($employe as $indice => $valeur){ //cette boucle parcours toutes les infos du sous array représentant un employé
        echo $indice . ' : ' . $valeur . '<br>';
    }
    echo '------------<br>'; //pour délimiter entre chq employé
}

//foreach (je parcours) l'array $donnees as $employe par ses valeurs (pas d'indice)
//je prends l'indice d'employe que j'associe aux valeurs $employe as $indice => $valeur
//1ere boucle indice principal/2eme boucle le sous détail


//------------------------------------------------------
echo '<h3>06. Exercice </h3>';
//------------------------------------------------------

// Affichez la liste des différents services, en la mettant dans une liste <ul><li>




$resultat = $pdo->query("SELECT DISTINCT service FROM employes");

echo '<ul>';
while($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){

echo '<li>';
    echo $contenu['service'];
echo '</li>';
    
}

echo '</ul>';

//<ul> hors de la boucle ><
//SELECT implique une requête query obligatoirement

//avec fetchAll

$resultat = $pdo->query("SELECT DISTINCT service FROM employes");

$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
echo '<ul>';
    foreach($donnees as $value){
        echo '<li>' . $value['service'] . '</li>';
    }
echo '</ul>';

//pas de fetchall dans une boucle while!

//------------------------------------------------------
echo '<h3>07. Table HTML </h3>';
//------------------------------------------------------


$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border="1">';
    //Affichage de la ligne des entêtes : 
    echo '<tr>';
        for($i = 0; $i < $resultat->columnCount(); $i++){
            //fait autant de tours de boucle qu'il y a de colonnes dans le jeu de résultats.
            //echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre>';
            //on voit que getColumnMeta() retourne un array qui contient l'indice name avec le nom du champ de la table sql
            $colonne = $resultat->getColumnMeta($i); //$colonne est donc un array avec dedans l'indice name
            echo '<th>' . $colonne['name'] . '</th>'; //on affiche le nom de la colonne
        }
        
//foreach parcours les lignes verticales donc obligé de faire for pour les colonnes

//2eme methode objet=resultat methode=($1) name = array
//echo '<th>' . $resultat->getColumnMeta($i)['name'] . '</th>'

    echo '</tr>';
    //affichage des lignes de la table:
    //plusieurs lignes donc while qu'on transforme en array
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
            foreach($ligne as $information){
                echo '<td>' . $information . '</td>';
            }    
        
        echo '</tr>';
    }

echo '</table>';

//------------------------------------------------------
echo '<h3>08. prepare, bindParam, execute </h3>';
//------------------------------------------------------

$nom = 'sennard';

//1 - Préparation de la requête:
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); //prépare la requête avec un marqueur nominatif qui attend une valeur.

//2 - on lie le marqueur à une variable:
    
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR); //bindParam reçoit exclusivement une variable vers laquelle pointe le marqueur. Ici on lie le marqueur nom a variable $nom. Ainsi si le contenu de la variable change, la valeur du marqueur changera automatiquement, lorsqu'on refera un execute. On a aussi les constantes PDO::PARAM_INT et PDO::PARAM_BOOL

//3 - on execute la requête :
$resultat->execute();

//4 - fetch:
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);

echo implode($donnees, '-'); //implode transforme le contenu d'un array en string.
//ne pas faire en prod moche :o

/*
Prepare() permet de préparer la requête mais ne l'execute pas.
execute() permet d'exécuter une requête préparée.

Valeur de retour: prepare() renvoie toujours un objet PDOStatement.
                  execute() 
                    Succès : true
                    Echec  : false
                    
Les requêtes préparées sont préconisées si vous exécutez plusieurs fois la même requête et ainsi vouloir éviter de répéter le cycle complet : analyse / interprétation de la requête /execution.  

Les requêtes préparées sont aussi utilisées pour assainir les données (quand on fait un prepare + un bindParam + execute).

*/

//si on change le contenu de la variable $nom, il n'est pas nécessaire de refaire un bindParam avant un nouvel execute.
$nom = 'durant';
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, '-');



//------------------------------------------------------
echo '<h3>09. prepare, bindValue, execute </h3>';
//------------------------------------------------------

//1 - Préparation de la requête:
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");

//2 - Lier le marqueur à une valeur:


$resultat->bindValue(':nom', 'thoyer', PDO::PARAM_STR);
//marqueur en 1ère position pas obligé de mettre :

//info internet donc pas besoin de PDO::PARAM_STR: bindValue(':nom', 'thoyer');

//3 - Execution de la requête
$resultat->execute();

//4 - fetch:

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, '-');


//------------------------------------------------------
echo '<h3>10. prepare, bindValue, execute </h3>';
//------------------------------------------------------

//Affichez dans une liste <ul><li> le titre des livres empruntés par Chloé en utilisant une requête préparée.


$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$prenom = 'Chloé';

//1 - Préparation de la requête:
$resultat = $pdo->prepare("SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = :prenom))"); 

//2 - on lie le marqueur à une variable:
    
$resultat->bindParam(':prenom', $prenom, PDO::PARAM_STR); 

//3 - on execute la requête :
$resultat->execute();


echo '<ul>';
while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
/*echo '<pre>'; print_r($donnees); echo '</pre>';*/
    
echo '<li>' . $donnees['titre'] . '</li>';
    
}

echo '</ul>';



//1- connexion a la bdd
//2- Requête prepare/bindParam/execute
//$stmt pour statement souvent utilisé
//3- fetch+while
//4- echo


//------------------------------------------------------
echo '<h3>11. Points Complémentaires </h3>';
//------------------------------------------------------

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

echo '<strong>Le Marqueur "?"</strong>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ?");
//on prépare la requête sans les variables que l'ont remplace par des marqueurs "?"

$resultat->execute(array('durand', 'damien'));

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); //pas de boucle while car je suis certain qu'il n'y'a qu'un seul résultat dans la requête. $donnees est un array associatif.
echo '<br>Service: ' . $donnees['service'] . '<br>';

echo '<strong>execute sans bindParam</strong>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom");

$resultat->execute(array('nom' => 'durand', 'prenom' => 'damien')); //nous associons les marqueurs nominatifs dans un array associatif passé en argument de execute. (pas obligé de remettre les :nom :prenom mot qui peut être changé en wtf)

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<br>Service : ' . $donnees['service'] . '<br>';







