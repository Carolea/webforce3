/*-----------------------------
LES FONCTIONS
-----------------------------*/

// -- Déclarer une fonction
// -- Cette fonction ne retourne aucune valeur et n'a aucun paramètre

function DitBonjour() {
// -- Lors de l'appel de la fonction, les instructions ci-dessous seront exécutées.
    alert("Bonjour !");
}

// -- Appeler / Utiliser une Fonction

DitBonjour();

// -- Déclarer une fonction qui prend une variable en paramètre

function Bonjour(Prenom) {
    document.write("<p>Hello <strong>" + Prenom + "</strong> !</p>");
}

// -- Appeler / Utiliser une Fonction avec un Paramètre

Bonjour("Hugo");



/*-----------------------------
EXERCICE :
Créez une fonction permettant d'effectuer l'addition de deux nombres passés en paramètre.
-----------------------------*/


function addition(nb1, nb2){
    // -- Le mot clé "return" permet de renvoyer une valeur en sortie
//    return nb1 + nb2; ou
    var resultat = nb1 + nb2;
    return resultat;
}

    var resultat = addition(10, 5);
    document.write("<p>" + resultat + "</p>");
