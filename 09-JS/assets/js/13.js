/*---------------------------
La Manipulation des Contenus
----------------------------*/
// Petite fonction de racourci (lesflemmards.js)

function w(t){
    document.write(t);
}
function l(e){
    console.log(e);
}

// -- Je souhaite récupérer mon lien; comment procéder?
var google = document.getElementById("google");
l(google);

// -- Maintenant je souhaite acceder aux informations de ce lien, par exemple: 

    // -- A : Le lien vers lequel pointe la balise
    l('le lien vers lequel pointe la balise');
    l(google.href);

    // -- B : L'ID de la balise
    l("L'ID de la Balise: ");
    l(google.id);

    // -- C : La classe de la balise
    l('La classe de la balise: ');
    l(google.className);


    // -- D : Le texte de la balise (l'élément)
    l('Le texte de la Balise');
    l(google.textContent);

// -- Maintenant je souhaite modifier le contenu de mon lien
// -- Comme une variable classique

google.textContent = "Mon lien vers Google";


/*-------------------------------
Ajouter un élément dans ma page
--------------------------------*/

// -- Nous allons utiliser 2 méthodes :
    
    // -- 1 : La fonction document.createElement() va permettre de générer un nouvel élément dans le DOM; que je pourrai par la suite modifier avec les méthodes que nous venons de voir.

// PS : Ce nouvel élément est placé en mémoire.


// -- Définition de mon Element

var span = document.createElement('span');

// -- Si je souhaite lui donner un ID
span.id = "MonSpan";

// -- Si je souhaite lui attribuer du contenu
span.textContent = "Mon beau texte en JS";

// -- 2 : La fonction appendChild() va me permettre de rajouter un enfant à un élément du DOM.

google.appendChild(span);


/*-------------------------------
Exercice

En partant du travail déjà réalisé sur la page.
Créez directement dans la page une balise <h1></h1> ayant comme contenu : "Titre de mon Article".

Dans cette balise, vous créerez un lien vers une url de votre choix.

Bonus: Ce lien sera de couleur Rouge et non souligné.
--------------------------------*/

// -- Création de la balise h1
var h1 = document.createElement("h1");

// -- Création de la balise a
var a = document.createElement("a");

// -- Je vais donner un titre à mon lien
a.textContent = "Titre de mon article";

// -- Je veux donner un lien à mon lien
a.href = "https://www.facebook.com/skillinprogramming/"

// -- appendChild()

    // -- Je met mon lien (a) dans mon h1
    h1.appendChild(a);

    // -- Je met mon h1 dans ma page, dans mon body
    document.body.appendChild(h1);

// -- Correction du Bonus

    // -- Je veux que mon lien soit de couleur rouge
    a.style.color = "red";
    
    // -- et non souligné
    a.style.textDecoration = "none";


//window.onload = function() {
//    var titre = document.createElement("h1");
//    titre.setAttribute("class","Titre_rouge");
//    var lien = document.createElement("a");
//    lien.setAttribute("href","https://www.facebook.com/skillinprogramming/");
//    var texte = document.createTextNode("Titre de mon Article !");
// 
//    lien.appendChild(texte); //on accroche texte a <a>
//    titre.appendChild(lien); //on accroche <a> a <h1>
// 
//    var node = document.getElementsByTagName("body")[0];
//    // pour plus de flexibilité, peut-être remplacé par :
//    // var node = document.getElementsByTagName("body")[0];
//    node.appendChild(titre);














































