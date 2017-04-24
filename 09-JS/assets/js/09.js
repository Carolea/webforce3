/*-----------------------------
LES BOUCLES
-----------------------------*/

// La Boucle FOR:

// -- Pour i = 1; tant que i <= (strictement inférieur ou égale) 10; alors, j'incrémente i de +1;

for(var i = 1 ; i <= 10; i++){   
 document.write("<p>Instruction executée :<strong>" + i + "</strong></p>")
}

// -- SUBTILITE
var i = 40;
i++ // Affiche 40 l'incrémentation se fait après
++i // Affiche 41 l'incrémentation se fait avant

// -- La boucle WHILE : Tant que

var j = 1;
while(j <= 10){   
document.write("<p>Instruction executée :<strong>" + j + "</strong></p>"); j++;
}

//sans j++, boucle infinie

/*-----------------------------
EXERCICE
-----------------------------*/

// -- Supposons, le tableau suivant :
var Prenoms = ['Hugo', 'Jean', 'Matthieu', 'Luc', 'Pierre', 'Marc'];

// -- Consigne: Grâce à une boucle FOR, afficher la liste des prénoms du tableau suivant dans la console ou sur votre page.

// -- 2ème façon de faire avec 'length'
for (var i = 0, c = Prenoms.length; i < c; i++) {

   console.log(Prenoms[i]);
}

// -- variante
var NbElementsDansMonTableau = Prenoms.length;
for(var i = 0 ; i < NbElementsDansMonTableau ; i++){
    console.log(Prenoms[1]);
}

// -- 1ère façon de faire
for(var i=0; i < 6; i++){
    console.log(Prenoms[i]);
}

// -- 3ème façon avec la boucle while
var j = 0;
while(j < Prenoms.length){
    console.log(Prenoms[j]);
    j++;
}


// -- Autre façon de parcourir mon tableau.
// -- Attention ici à la performance...
console.log('- - -');

Prenoms.forEach(affichePrenoms);

function affichePrenoms(Prenom, index) {
    console.log(Prenom);
}


// https://benhollis.net/blog/2009/12/13/investigating-javascript-array-iteration-performance/

// https://leftshift.io/4-javascript-optimisations-you-should-know







