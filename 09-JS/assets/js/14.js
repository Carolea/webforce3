/*---------------------------------------------------
Les Evenements

Les événements vont me permettre de déclencher 
une fonction, c'est à dire une série d'instructions
suite à une action de mon utilisateur.

OBJECTIF: être en mesure de capturer ces événements, 
afin d'exécuter une fonction.
----------------------------------------------------*/

// -- Les événements : MOUSE (Souris)

    //  click : au clic sur un élément.
    //  mouseenter : la souris passe par dessus la zone occupée par un élément.
    //  mouseleave : la souris sort de cette zone.

// -- Les événements : KEYBOARD (Clavier)

    // keydown : une touche du clavier est enfoncée.
    // keyup : une touche a été relachée.

// -- Les événements : Window (Fenetre)

    // scroll : défilement de la fenêtre.
    // resize : redimensionnement de la fenetre.

// -- Les événements : DOCUMENT

    // DOMContentLoaded : Executé lorsque le document HTML est complétement chargé sans attendre le CSS et les images.

/*-------------------------------
Les Ecouteurs d'Evenements
--------------------------------*/

// -- Pour attacher un évènement à un élément, ou autrement dit, pour déclarer un écouteur d'évènement qui se chargera de lancer une action, c'est à dire une fonction pour un évènement donné, je vais utiliser la syntaxe suivante:

var p = document.getElementById("MonParagraphe");
console.log(p);

// -- Je souhaite que mon paragraphe soit rouge au clic de la souris.

    // -- 1: Je définis une fonction chargée d'exécuter cette action.
    function changeColorToRed(){
        p.style.color= "red";
    }

    // -- 2: Je déclare un écouteur qui se chargera d'appeler la fonction du déclencheur d'événement.
    p.addEventListener("click", changeColorToRed);


/*-------------------------------
Exercice Pratique

A l'aide de Javascript, créez un champ "input" type text avec un ID unique.
Affichez ensuite dans une alert, la saisie de l'utilisateur
--------------------------------*/
function l(e){
    console.log(e);
}

// -- Création du champ input
var input = document.createElement('input');

// -- Attribution d'un attribut
input.setAttribute('type','text');

// -- Attribution d'un ID
input.id = "MonInput";

// -- Ajout de l'élément dans la page
document.body.appendChild(input);

// --------------------------------

// -- Création d'un écouteur
input.addEventListener('change', afficheLaSaisieDeMonInput);

function afficheLaSaisieDeMonInput() {
    alert(input.value);
}


 



//function Champ(MonParagraphe) {
// var result= true;
// field= document.getElementById(MonParagraphe);
// // On accède à la valeur du champ par la propriété javascript value,
// // et pas par l'attribut DOM value !!!
// var value= field.value;
// if (value == "") {
// result= false;
// }
// return result;
// }



//function controle(form1) {
//var MonParagraphe = document.form1.input.value;
//alert("Vous avez tapé : " + test);
//}


//var MonParagraphe = document.getElementById("MonParagraphe");
//l(MonParagraphe);


//var MonParagraphe=0;
//function AddChamp(){
//  document.getElementById(MonParagraphe).innerHTML = "<input type=\"text\" name=\"nom[]\" /> <div id=\"" + (++MonParagraphe) + "\"></div>";
//}









