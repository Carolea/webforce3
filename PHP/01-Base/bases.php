<style>
    h2{
        margin: 0;
        font-size: 15px;
        color: rebeccapurple;
    }
</style>


<?php

//-------------------------------
echo '<h2>Les balises PHP</h2>';
//-------------------------------

//echo = tu affiches sur le navigateur

?>


<?php
// pour ouvrir un passage en php on utilise la balise précédente et pour fermer la suivante
?>

<strong>Bonjour</strong> 
<!--
En dehors des balises php on peut écrire du html. L'inverse n'est cependant pas possible, pas de php dans une page html.
-->

<?php

// Vous n'êtes pas obligé de fermer un passage php en fin de script

// En PHP toutes les instructions se terminent par un ;


//-------------------------------------
echo '<h2>Ecriture et Affichage</h2>';
//-------------------------------------

echo 'Bonjour'; // echo est une instruction qui permet d'effectuer un affichage dans le navigateur.

echo '<br>';   // on peut mettre du htlm entre les quotes qui suivent echo.

print 'Nous sommes mardi';  // print fait la même chose qu'echo.

// Il existe d'autres instructions d'affichage que nous verrons plus loin :
// print_r();
// var_dump();

// ceci pour faire un commentaire sur une ligne

/*Et la pour plusieurs
ligne.*/

//-------------------------------------------------------------
echo '<h2>Variable : Types / Déclaration / Affectation</h2>';
//-------------------------------------------------------------

// Une variable est un espace mémoire nommé permettant de conserver une valeur.

// On déclare une variable avec le $ en PHP

$a = 127; //Je déclare la variable appelée a et lui affecte la valeur 127 (coller $ et le nom de la variable)

echo gettype($a); //$a est de type integer (entier)

echo '<br>';

$b = 1.5;
echo gettype($b); // $b est de type double (nbr décimal)

echo '<br>';

$a = 'une chaîne';

echo '<br>';

$b = '127';
echo gettype($a); //$a/$b sont de type string


echo '<br>';

$a = true;
echo gettype($a); //$a est de type booleen

$b = FALSE; // insensible à la casse (true/false)


//----------------------------------
echo '<h2>Concaténation</h2>';
//----------------------------------

$x = 'Bonjour';
$y = 'tout le monde';

echo $x . $y . '<BR>';
// par convention on espace av/ap point
// on concatène les valeurs de $x et $y suivies d'une balise <BR>

// -------
// Concaténation lors de l'affectation :
$prenom1 = 'Bruno'; 
//on affecte la valeur Bruno à $prenom1
$prenom1 = 'Claire';
echo $prenom1 . '<BR>'; 
//affiche Claire car elle a remplacé la valeur 'Bruno' dans la variable prenom1

$prenom2 = 'Bruno';
$prenom2 .= 'Claire'; //on affecte la valeur Claire à la suite de la valeur Bruno. On obtient ainsi le string 'Bruno Claire'

echo $prenom2 . '<BR>';

//----------------------------------
echo '<h2>Guillemets & Quotes</h2>';
//----------------------------------

$message = "aujourd'hui"; //ou bien:

$message = 'aujourd\'hui'; //on échappe (antislash) les apostrophes quand on est dans des quotes

$txt = 'Bonjour';
echo '$txt tout le monde <br>';  //Ici on affiche littéralement $txt, nom de la variable.
echo "$txt tout le monde <br>"; //Ici la variable est évaluée, contenu de la variable. Evaluation du contenu: 'Bonjour tout le monde'.

//--------------------------
echo '<h2>Constantes</h2>';
//--------------------------

//Définition, une constante et un espace mémoire nommé qui contient une valeur mais celle-ci n'est pas modifiable (donc constante). On ne peut donc pas la modifier lors de l'execution du script. (par ex: les valeurs de connexion a la bdd).

define('CAPITALE', 'Paris'); //déclare la constante capitale (par convention, écrit en majuscule, du coup ne pas modifier les trucs en maj) et lui affecte la valeur Paris. Pas de $.                               

echo CAPITALE . '<br>'; //affiche Paris.

//------------------
//Exercice : afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables.

$couleur  = 'Bleu-';
$couleur .= 'Blanc-';
$couleur .= 'Rouge';

echo $couleur;

$x = 'Bleu';
$y = 'Blanc';
$z = 'Rouge';

echo $x . '-' . $y . '-' . $z . '<br>';
echo "$x-$y-$z <br>";

//-------------------------------------------
echo '<h2>Les opérateurs arithmétiques</h2>';
//-------------------------------------------

$a = 10;
$b = 2;

echo $a + $b . '<br>';  //J'additionne a+b et je concatene le résultat
//ou
echo ($a + $b) . '<br>';


echo $a - $b . '<br>';
echo $a * $b . '<br>';
echo $a / $b . '<br>';
echo $a % $b . '<br>'; //modulo, affiche 0 (reste de la division entière). Pratique pour calculer si un nbr est pair ou impair grâce au modulo 2 (par ex css une ligne sur 2).

//-----

$a = 10;
$b = 2;

$a += $b;  //équivaut à $a = $a + $b ici $a vaut 12 
$a -= $b;  // $a vaut 10
$a *= $b;  // $a vaut 20
$a /= $b;  // $a vaut 10
$a %= $b;  // $a vaut 0 (10%2)

//-----

$i = 0;
$i++; //incrémentation = ajoute +1
$i--; //décrémentation = retire -1

//----------------------------------------------
echo '<h2>Les Structures Conditionnelles</h2>';
//----------------------------------------------

//structure conditionnelle, structure iterative, fonction pas de ; à la fin

$a = 10; $b = 5; $c = 2;

if ($a > $b) {
    //si la condition est true on éxecute les accolades
    //si entre " on a le résultat " "10 est supérieur à 5"
    print '$a est supérieur à $b <br>';
} else {
    //si la condition est false on exécute le else
    print 'Non, c\'est $b qui est supérieur à $a <br>';
}


//-----
if ($a > $b && $b > $c) {
    //double esperluette pour AND. Si les 2 conditions sont vraies on exécute les accolades.
    print 'Ok pour les 2 conditions <br>';
} else {
    print 'nous sommes dans le else <br>';
}

//----
if ($a == 9 || $b > $c){
    //si $a est égal à 9 OU $b supérieur à $c, on exécute les accolades
    print 'une des deux conditions est vraie <br>';
} else {
    //sinon, si les 2 conditions sont fausses, on exécute le else
    print 'nous sommes dans le else <br>';
}

//----
$a = 10; $b = 5; $c = 2;

if ($a == 8){
    //si $a est égal à 8:
    echo 'reponse 1 <br>';
} else if ($a != 10){
    //si $a est égal à 10:
    echo 'reponse 2 <br>';
} else {
    //sinon, si les 2 conditions précédentes sont fausses :
    echo 'reponse 3 <br>';
}

// Attention un else n'est jamais suivi d'une condition (sinon utiliser elseif)

//----------------
//Forme Contractée Dite Ternaire : 2ème possibilité d'écrire le if/else :
echo ($a == 10) ? '$a égal à 10 <br>' : '$a est différent de 10 <br>';
$resultat = ($a == 10) ? '$a égale à 10 <br>' : '$a est différent de 10 <br>';

//Le ? remplace le if et le ":" remplace le else. Si la condition avant le "?" est vraie, on exécute l'instruction avant le ":" sinon l'instruction après les ":".


//---------------

//Comparaison == OU ===
$vara = 1;
$varb = '1';

if ($vara == $varb) echo '$vara est égale à $varb en valeur <br>';
//pas d'else on peut omettre les {}

if ($vara === $varb) echo '$vara est égale à $varb en valeur et en type<br>';
//ici les 2 variables sont de types différents, donc le === renvoie false

/*synthèse:
 =    est un signe d'affectation
 ==   est un signe de comparaison en valeur
 ===  est un signe de comparaison en valeur ET en type (strictement égal)
*/

//---------

//isset et empty:

//empty() = teste si le contenu des parenthèses est vide: '', 0, NULL, false ou non défini.
//isset() = teste si c'est défini ET à une valeur non NULL

$var1 = 0;
$var2 = '';

if (empty($var1)) echo '0, vide, NULL, false ou non défini <br>';

if (isset($var2)) echo '$var2 existe et est non NULL <br>';

//Différence entre isset et empty : si on commente les lignes 271/272, empty renvoi TRUE car $var1 n'est plus défini et isset renvoie FALSE car $var2 n'est pas défini.


//---------------------------------
echo '<h2>Condition Switch</h2>';
//---------------------------------

$couleur = 'jaune';

switch($couleur){
    case 'bleu'  : echo 'Vous aimez le bleu'; break;
    case 'rouge' : echo 'Vous aimez le rouge'; break;
    case 'vert'  : echo 'Vous aimez le vert'; break;
    default: echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
}

//Le switch compare la valeur de ce qui est entre parenthèses aux différents case.
//On exécute les instructions du case dans lequel on tombe. Le break signifie sortir de la condition.
//Si aucun cas ne correspond on tombe alors dans le default.

//--------------
//Exercice : reécrire ce switch avec des conditions if/else classiques.

$couleur = 'jaune';

if($couleur == 'bleu'){
    echo 'Vous aimez le bleu';
} else if ($couleur == 'rouge') {
    echo 'Vous aimez le rouge';
} else if ($couleur == 'vert') {
    echo 'Vous aimez le vert';
} else {
    echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
}


//-------------------------------------
echo '<h2>Fonctions Prédéfinies</h2>';
//-------------------------------------

//Une fonction prédéfinie permet de réaliser un traitement spécifique prévu dans le langage PHP.
//strpos = string position

$email1 = 'prenom@site.fr';

echo strpos($email1, '@');
// nous renvoie la position 6 du caractère '@' dans la chaîne contenue dans $email1. Démarre à 0 curseur avant le p

echo '<br>';

$email2 = 'bonjour';
echo strpos($email2, '@');

//rien ne s'affiche vu que pas de @

var_dump(strpos($email2, '@'));

// bool(false) Grâce à var_dump on aperçoit le false retourné par la fonction strpos quand elle ne trouve pas l'@ dans $email2. var_dump est donc une fonction d'affichage améliorée que l'on utilise en phase de développement.

//Quand on utilise une fonction prédéfinie, il faut s'interroger sur les arguments à lui donner et sur ce qu'elle retourne:

/*strpos retourne:
    succès : un integer qui représente la position du caractère recherché
    échec  : booléen FALSE
*/

echo '<br>';

//-----
$phrase = 'mettez une phrase ici à cet endroit';
echo strlen($phrase); //affiche la longueur string length d'une chaîne de caractères, ici 36 (l'accent de à compte pour un caractère)

/*strlen() retourne :
    succès : integer
    échec  : booléen False
*/


echo '<br>';

//----

$texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation';

echo substr($texte, 0, 20) . '...<a href="">lire la suite</a>';
//Retourne une partie du txt avec un lien pour la suite

/* substring() retourne:
    succès : string
    échec  : booléen false
*/

echo '<br>';

//----------

echo str_replace('site', 'gmail', $email1);

// remplace le string 1 par le 2 dans le 3


echo '<br>';

//----------

$message = '  Hello   World  ';
echo strtolower($message) . '<br>';      //affiche tout en minuscule
echo strtoupper($message) . '<br>';     //affiche tout en majuscule
echo strlen($message) . '<br>';        //affiche 17 avec les espaces
echo strlen(trim($message)) . '<br>'; // affiche la longueur sans les espaces av/ap la chaîne de caractères.

echo '<br>';

//----------

$message = '<h1>Hello World !</h1><p> How are you ?</p>';

/*echo $message;*/
echo strip_tags($message) . '<br>'; 

// br par concatenation du coup 
//affiche le message sans les balises HTML (utile dans un contexte de sécurité)


//-------------------------------------
echo '<h2>Le Manuel PHP</h2>';
//-------------------------------------

//http://php.net/manual/fr/index.php

//-----------------------------------------
echo '<h2>Les Fonctions Utilisateur</h2>';
//-----------------------------------------

//Les fonctions qui ne sont pas prédéfinies dans le langage, sont déclarées puis exécutées par le développeur.

//Déclaration d'une fonction:

function separation(){
    echo '<hr>';
    //fonction sans paramètre, les parenthèses sont donc vides (mais obligatoire).
}

//Appel de la fonction:
separation(); 
//on execute une fonction en l'appelant par son nom suivi de parenthèses.


echo '<br>';

//----------

//Les Fonctions Avec Paramètres:

//Les paramètres du fonction sont destinés à recevoir une valeur qui permet de compléter ou modifier le comportement de la fonction.

function bonjour($qui){ //$qui est un paramètre : il reçoit la valeur de l'argument qui est donné lords de l'appel de la fonction.
    return 'Bonjour ' . $qui . '<br>';
    echo 'ce code ne sera jamais executé...'; // return nous fait quitter la fonction : ce code n'est donc pas executé.
}

echo bonjour('Pierre'); // si une fonction attend un argument, il faut le lui passer.

//Le return fait quitter une fonction. Pour faire marcher l'echo le mettre avant le return ou hors de la fonction

//On peut remplacer Pierre par une variable si elle est définie.
$prenom = 'John';
echo bonjour($prenom); //l'argument peut être une variable

//-----------

function appliqueTva($nombre){
    return $nombre * 1.2;
}

//Applique une tva a 20%


//Exercice : à partir de cette fonction, écrivez une fonction appliqueTva2 qui calcule un nombre multiplié par n'importe quel taux donné à la fonction.

function appliqueTva2($nombre, $taux){
    return $nombre * $taux;
}

echo appliqueTva2(100, 3);

echo '<br>';

//----------
// variable "optionnelle", parametre par défaut = 1.1 si il n'est pas donné dans l'appel de la fonction. On peut spécifier une valeur par défaut à un paramètre dans les parenthèses lors de la déclaration de la fonction (ici $taux = 1.1). Dans ce cas, si la valeur n'est pas passée lors de l'appel, le paramètre prend cette valeur par défaut.

/*
function appliqueTva2($nombre, $taux = 1.1){
    return $nombre * $taux;
};

echo appliqueTva2(100);
*/

//-----------
//Au sein d'une nouvelle fonction exoMeteo(), afficher l'article "au" pour le printemps et "en" pour les autres


function meteo($saison, $temperature){
    echo "Nous sommes en $saison et il fait $temperature degrés <br>";
}

meteo ('hiver', 2);
meteo ('printemps', 1);
meteo ('ete', 24);
meteo ('automne', 14);

/*function exoMeteo($saison, $temperature){
    if($saison === 'printemps'){
        echo "Nous sommes au $saison et il fait $temperature degrés <br>";
    } else {
        echo "Nous sommes en $saison et il fait $temperature degrés <br>";
    }
}*/


echo '<br>';
//----------

function exoMeteo($saison, $temperature){
    if($saison === 'printemps'){
        $article = 'au';
    } else {
        $article = 'en';
    }
    
    //correction version ternaire:
    $article = ($saison == 'printemps') ? 'au' : 'en';
    
    
    echo "Nous sommes $article $saison et il fait $temperature degrés <br>";
}



/* ternaire foirée
function exoMeteo($saison, $temperature){
    echo ($saison === 'printemps') ? 'Nous sommes au $saison et il fait $temperature degrés' : 'Nous sommes en $saison et il fait $temperature degrés';
}
*/

exoMeteo('printemps', 10);

//--------------
//Variables locales et globales


/*espace global
function maFunction{
    //espace local
}
espace global*/


function jourSemaine(){
    $jour = 'mercredi'; //variable locale
    return $jour; // retourne la valeur de $jour à l'extérieur de la fonction
}

//echo $jour; erreur car on utilise une variable locale à la fonction jourSemaine dans l'espace global. (Notice: Undefined variable: jour in C:\xampp\htdocs\webforce3\PHP\01-Base\bases.php on line 542) Pour s'en sortir il faut faire return $jour.

echo jourSemaine() . 'br'; // on récupère la valeur retournée par le return de la fonction.



echo '<br>';
//----------

$pays = 'France'; //variable globale
function affichagePays(){
    global $pays; //le mot clé global permet d'utiliser une variable déclarée dans l'espace global au sein de la fonction
    echo $pays;  //on peut utiliser $pays grâce au global ci-dessus (en php mais pas en js)
}

affichagePays(); //appelle la fonction du dessus qui va executer l'echo

//--------------------------------------------------
echo '<h2>Les Structures itératives : boucles</h2>';
//--------------------------------------------------

//boucle while
$i = 0; //valeur de départ

while($i < 3){
    echo "$i---";
    $i++; //ne pas oublier l'incrémentation pour ne pas avoir une boucle infinie
}

// $i += 2, ajoute de 2 en 2 _ 0 2 4

echo '<br>';
//-----------
//Exercice : à l'aide d'une boucle while, afficher dans un sélecteur les années de 1917 à 2017.

/*echo '<select>';
    echo '<option>1</option>';
    echo '<option>2</option>';
    echo '<option>3</option>';
echo '</select>';*/


/*$i = 1917;
    echo '<select>';

while ($i >= 1917 && $i <= 2017) {
        echo '<option>'.$i++.'</option>';
    }

    echo '</select>';*/

$a = 1917;
echo '<select>';
    while ($a <= 2017){
        echo "<option>$a<option>";
        $a++;
    }
 echo '</select>';



//----------------
// Boucle for:
echo '<br>';

for($j = 0; $j < 16; $j++){ 
    //on commence par initialiser la variable $j; condition d'entrée dans la boucle; incrémentation ou décrémentation
    print $j . '<br>';    
}


//Exercice: Afficher dans un sélecteur les nbr de 1 à 30 avec une boucle for

echo '<select>';
    for($j = 1; $j <= 30; $j++){
        print "<option>$j<option>";
    }
echo '<select>';

//balise select à l'exterieur de la boucle pour ne pas avoir 30 selecteurs.


echo '<br>';
//Exercice: Afficher les chiffres de 0 à 9 sur la même ligne dans une table html

echo '<table border="1">';
    echo '<tr>';
        echo '<td>1</td>';
        echo '<td>2</td>';
        echo '<td>3</td>';
    echo '</tr>';
echo '</table>';


    echo '<table border="1">';
    echo '<tr>';
for($t = 0; $t <= 9; $t++){
    echo '<td>'.$t.'</td>'; 
}
    echo '</tr>';
    echo '</table>';

//ou

    echo '<table border="1">';
    echo '<tr>';
for($t = 0; $t <= 9; $t++){
    echo "<td>$t</td>"; 
}
    echo '</tr>';
    echo '</table>';


//-------------
//Boucle do while

//La boucle do while a la particularité de s'exécuter au moins UNE fois, puis tant que la condition de fin est vraie

do{
    echo 'Je m\'affiche au 1er tour de boucle';
} while(false); //la condition est fausse et pourtant la boucle a bien fait un tour




//--------------------------------------------------
echo '<h2>Les tableaux de données : arrays </h2>';
//--------------------------------------------------

//Un tableau se déclare un peu comme une variable dans laquelle on peut stocker un ensemble de valeurs. Ces valeurs peuvent être de n'importe quel type.

//Déclaration d'un array:
$liste = array('gregoire', 'nathalie', 'emilie', 'françois', 'georges');
//ou $liste = []

//echo $liste; erreur array to string conversion car on ne peut pas directement afficher un array

//pour afficher rapidement en phase de développement le contenu d'un array :
echo '<pre>';var_dump($liste); echo '</pre>';

echo '<pre>'; print_r($liste); echo '</pre>';

// => double fleche d'association

//autre manière d'affecter des valeurs à un array
$tab[] = 'France'; //Les crochets vides permettent d'ajouter la valeur 'France' au 1er indice disponible, ici indice 0

$tab[] = 'Italie';
$tab[] = 'Suisse';
$tab[] = 'Portugal';

echo '<pre>'; print_r($tab); echo '</pre>';

//Pour accéder à l'élément Italie de l'array $tab:
echo $tab[1]. '<br>'; //on précise l'indice de l'élément  entre crochet après le nom du tableau.

//-------
//Tableau associatif:
$couleur = array ('j' => 'jaune', 'b' => 'bleu', 'v' => 'vert'); 
    //à gauche de la fleche on peut choisir l'indice, il s'agit alors d'un array associatif.

    //pour accèder à un élément du tableau associatif:
echo 'La seconde couleur de notre tableau est le' . $couleur['b'];
    //affiche bleu

echo '<br>';

echo "La seconde couleur de notre tableau est le $couleur[b]"; //pas besoin de quote sur b car il y'a déjà les guillemets autour de la phrase. Ceci affiche bleu aussi mais un array écrit dans des guillemets perd les quotes autour de son indice.!!!

echo '<br>';
//----------
//Quelques fonctions utiles prédéfinies sur les array:

echo 'Taille du tableau : ' . count($couleur) . '<br>';
//compte le nbr d'éléments dans le tableau, ici 3 (utile notamment pour donne la fin d'une boucle).
echo 'Taille du tableau : ' . sizeof($couleur) . '<br>'; // fait exactement la même chose que count

$chaine = implode('-', $couleur);
echo $chaine . '<br>';

//fonction prédéfinies qui rassemble les éléments d'un array en une chaîne, séparés par le séparateur indiqué. $chaine est un string.
    
$couleur2 = explode('-', $chaine);
var_dump($couleur2);

//Fonction prédéfinie qui transforme une chaîne contenant un séparateur comme le "-" en un tableau. Avec l'echo on voit bien que $couleur2 est bien un array.

echo '<br>';
//----------------------------------
echo '<h2>La Boucle foreach </h2>';
//----------------------------------
echo '<pre>'; print_r($tab); echo '</pre>';


//La boucle foreach permet de parcourir un array ou un objet

foreach($tab as $valeur){
    echo $valeur . '<br>';
}
//parcourt l'array $tab par ses valeurs. $valeur prend successivement à chq tour de boucle les valeurs contenues dans $tab

//Pour parcourir les indices ET les valeurs:
foreach($tab as $indice => $valeur){
    echo $indice . ' correspond à ' . $valeur . '<br>';
}

//Exercice : écrire un array avec les indices prenom, nom, email et téléphone et y associer des valeurs. Puis vous affichez avec une boucle foreach les indices et les valeurs dans des <p>, sauf pour le prenom qui doit être dans un <h1>.

$liste = array('prenom:' => 'carole', 'nom:' => 'a', 'email:' => 'eojf@foj.com', 'telephone:' => '008 905 0110');

echo '<pre>'; print_r($liste); echo '</pre>';

foreach($liste as $indice => $valeur){
    if ($indice == 'prenom:'){
        echo '<h1>' . $indice . $valeur . '</h1>';
    } else {
        echo '<p>' . $indice . $valeur .'</p>';
    }
}

/*$membre = array('prenom'    => 'John',
                'nom'       => 'Doe',
                'email'     => 'jdoe@gmail.com',
                'telephone' => '0123456789'
               );

foreach($membre as $indice => element){
    if($indice == 'prenom'){
        echo "<h1>$indice : $element</h1>";
    }else {
        echo "<p>$indice : $element</p>";
    }
}*/


//indice =>fleche valeur


//-----------------------------------------
echo '<h2>Tableau Multidimensionnel</h2>';
//----------------------------------------

//On parle de tableau multidimensionnel quand un tableau est contenu dans un autre tableau.

//Creation d'un tableau multidimensionnel:

$tab_multi = array(
               array('prenom' => 'Julien', 'nom' => 'Dupond', 'tel' => '0600000000'),
               array('prenom' => 'Nicholas', 'nom' => 'Duran', 'tel' => '0600000000'),
               array('prenom' => 'Pierre', 'nom' => 'Duchemol'),
            );

echo '<pre>'; print_r($tab_multi); echo '<pre>';

//pour accèder à la valeur 'julien'. 
echo $tab_multi [0]['prenom'] . '<br>'; //nous entrons dans $tab_multi à l'indice 0 pour aller ensuite à l'indice 'prenom'.

echo '<br>';
//on va parcourir le tableau multidimensionnel avec une boucle for:

for($i = 0; $i < count($tab_multi); $i++){

echo $tab_multi[$i]['prenom'] . '<br>';
}

//count($tab_multi) = count(3).


echo '<hr>';

//Exercice : Afficher les prénoms de $tab_multi avec une boucle foreach.
foreach($tab_multi as $key => $value){
    
    echo $tab_multi[$key]['prenom'] . '<br>';
}

//ou
echo '<br>';

foreach($tab_multi as $key => $value){
    
    echo $value['prenom'] . '<br>';
}


//----------------------------------------
echo '<h2>Inclusion De Fichiers</h2>';
//----------------------------------------

echo 'Première inclusion: ';
include('exemple.inc.php'); //après include on précise le chemin du fichier à inclure. Permissif en cas d'absence du fichier il affiche un warning mais continue le script.

echo 'Deuxième inclusion: ';
include_once('exemple.inc.php'); //empeche que le fichier soit réutilisé. Le once vérifie si le fichiera déjà été inclus et si c'est le cas, ne fait pas l'inclusion.

echo 'Troisième inclusion: ';
require('exemple.inc.php'); //En cas d'absence du fichier, il est non permissif, affiche une erreur fatal et stop l'execution.

echo 'Quatrième inclusion: ';
require_once('exemple.inc.php'); //avec once on vérifie d'abord que le fichier n'est pas déjà inclus. 

/*
Différence entre include et require: 
Elle apparaît uniquement si on ne parvient pas à inclure le fichier demandé:
- include : génère une erreur de type warning et continue l'execution du script.
- require : génère une erreur de type fatal error et stoppe l'exécution du script.

Le .inc dans le nom du fichier est là à titre indicatif, précisant au développeur qu'il s'agit d'un fichier d'inclusion et non d'une page à part entière.

*/

//----------------------------------------
echo '<h2>Gestion Des Dates</h2>';
//----------------------------------------

//La fonction prédéfinie date() renvoie la date du jour selon le format spécifié : 
echo date('d/m/Y H:i:s'); //date et heure. Affiche la date au format JJ/MM/AAAA ainse que Heure:minute:seconde

echo date('y-m-d'); //affiche la date au format AA-MM-JJ. Notez que l'on peut changer le séparateur.

//-----------
/*
Définition du timestamp Unix:
Le timestamp est le nbr de secondes écoulées entre une date et le 1er janvier 1970 à 00:00:00.

Cette date correspond à la création d'UNIX, premier système d'exploitation. 

On utilise le timestamp dans de nombreux langages de programmation dont le php et le javascript.
*/


//La fonction prédéfinie time() retourne l'heure courante en timestamp:

echo time();
echo '<br>';

//On va utiliser le timestamp pour passer une date d'un format vers un autre format:

$dateJour = strtotime('29-05-2017'); //transforme la date en timestamp. J'ai une date que je transforme en timestamp que je lie a une variable $dateJour

echo $dateJour . '<br>';

$dateFormat = strftime('%Y-%m-%d', $dateJour); //transforme un timestamp en date au format indiqué. Sert notamment a modifié le format d'un formulaire pour la bdd qui n'accepte que le format us.

echo $dateFormat . '<br>';

//ces 2 fonctions ne seront plus utilisables en 2038 il faut donc passer par la version objet.

//-------
//Créer une date avec la classe DateTime (approche object):

//$date = new DateTime(date('d-m-Y')); pour la date du jour

$date = new DateTime('11-04-2017'); 

//On crée un objet $date de type DateTime en utilisant le mot clé new suivi du nom de la classe DateTime. On passe une date en argument de DateTime.

//(La classe (DateTime), est un plan qui permet de construire un objet qui est une date ($date)

echo $date->format('Y-m-d');
    
//L'objet est suivi de ->
//On peut formateur l'objet $date en appelant sa méthode format() et en lui indiquant les paramètres du format souhaité, ici Y-m-d.

//*****************************************
echo '<h2> Introduction aux objets <h2>';
//*****************************************  

//Un objet et un autre type de données. Il permet de regrouper des informations. On peut y déclarer des variables appelées attributs ou propriétés, ainsi que des fonctions appelées méthodes.

//Exemple 1:
//Nous créeons une classe appelée Etudiant qui nous permet de créer des objets de type Etudiant. Ils auront les attributs et les méthodes de cette classe.
class Etudiant{ //le moule/plan/modèle
    public $prenom = 'Julien';
    public $age    = 25; //$prenom et $age sont des attributs/propriétés/caractéristiques. public permet de préciser qu'ils seront accessibles partout contrairement à private protected.
    
    public function pays(){ //pays est une méthode
        return 'France';
    }
    
}

$objet = new Etudiant(); //Etudiant instancier en un objet. new est un mot clé permettant d'instancier la classe et d'en faire un objet.

echo '<pre>'; print_r($objet); echo '</pre>';

//on voit le type de $objet, la classe dont il est issu et les propriétés qu'il contient.

echo $objet->prenom . '<br>'; //pour accéder à la propriété prenom qui est dans l'objet, je mets une flèche ->
echo $objet->age . '<br>'; //affiche 25

echo $objet->pays(); //appel d'une méthode toujours avec les parenthèses.

//Exemple 2: un panier d'achat de site e-commerce:
class Panier {
    public function ajout_article($article){
        //ici le code pour ajouter l'article au panier
        return "L'article $article a bien été ajouté au panier";
    }
    
}

//Création d'un objet panier:
$panier = new Panier();
echo $panier->ajout_article('Pull'); //appelle la méthode ajout_article en lui passant l'argument 'Pull' pour l'ajouter au panier. Les méthodes s'appellent après une -> et avec des ().

    










