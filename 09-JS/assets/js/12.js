/*-------------------------------------------------
LE DOM

Le DOM, est une interface de développement en JS
pour HTML. Grâce au DOM, je vais êtreen mesure 
d'acceder / modifier mon HTML.


L'objet "document" : c'est le point d'entrée vers
mon contenu HTML!

Chaque page chargée dans mon navigateur à un objet
"document".

---------------------------------------------------*/

// -- Alons faire un tour dans notre HTML --->

//---> De retour dans notre JS : Comment puis-je faire pour récupérer les différents informations de ma page HTML?

/*---------------------------------------
Document.getElementById

document.getElementById(): Une fonction
qui va permettre de récupérer un élément
HTML à partir de son identifiant unique
ou ID.
-----------------------------------------*/
    
var bonjour = document.getElementById("bonjour");
console.log(bonjour); // <p id="bonjour">Paragraphe</p>

/*-----------------------------------------------------
Document.getElementsByClassName 

document.getElementsByClassName(): Une fonction
qui va permettre de récupérer un, ou des éléments, 
c'est à dire une liste HTML à partir de sa classe.
(*passe sous forme tableau)
-------------------------------------------------------*/

var contenu = document.getElementsByClassName("contenu");
console.log(contenu);

// -- Me renvoi: un tableau JS avec mes éléments HTML, ou encore autrement dit, une collection d'éléments HTML.

/*-----------------------------------------------------------
Document.getElementsByTagName 

document.getElementsByTagName(): Une fonction
qui va permettre de récupérer un, ou plusieurs éléments, 
c'est à dire une liste HTML à partir de son *nom de balise*.
(*passe sous forme tableau)
-------------------------------------------------------------*/

var span = document.getElementsByTagName("span");
console.log(span);
