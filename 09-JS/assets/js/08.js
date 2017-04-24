/*-----------------------------
LES CONDITIONS
-----------------------------*/

var MajoriteLegaleFR = 18;

if(MajoriteLegaleFR >= 18){
    alert("Bienvenue !");
} else{
    alert('Google..');
}

/*--------------------------
Exercice

Créer une fonction permettant de vérifier l'âge d'un visiteur.
S'il a la majorité légale, alors je lui souhaite la bienvenue, sinon je fais une redirection sur Google après lui avoir signalé le soucis.
--------------------------*/

// 1 -- Déclarer la majorité légale
var MajoriteLegaleFr = 18;

// 2 -- Créer une fonction pour demander son âge
function verifierAge() {
    //Demande de l'age de mon visiteur et le retourner
return parseInt(prompt("Saisissez votre âge", "âge"));
}

// 3 -- Une condition pour vérifier l'âge
if(verifierAge() >= MajoriteLegaleFr) {
    // -- J'affiche un message de bienvenue
    alert("Bienvenue !");
} else {
    // -- J'affiche une alerte
    alert("Attention vous devez être majeur pour accèder à ce site ! ");
    // -- Je redirige vers Google
    document.location.href = "http://lmgtfy.com/?q=majorit%C3%A9";
}

/*-----------------------------
LES OPERATEURS DE COMPARAISON
-----------------------------*/

// -- L'opérateur de comparaison "==" signifie : Egal à ... Il permet de vérifier que deux variables sont identiques.

// -- L'opérateur de comparaison "===" signifie : Strictement égal à ... Il va comparer la valeur et aussi le type de données.

// -- L'opérateur de comparaison "!=" signifie : Différent de 

// -- L'opérateur de comparaison "!==" signifie : Strictement Différent de

/*----------------------------
Exercice

J'arrive sur un Espace Sécurisé au moyen d'un email et d'un mot de passe.
Je dois saisir mon email et mon mort de passe afin d'être authentifié sur le site.
En cas d'échec une alert m'informe du problème.
Si tout se passe bien, un message de bienvenue m'accueille.
-----------------------------*/

// -- BASE DE DONNEES
var email, mdp;

email = "wf3@hl-media.fr";
mdp   = "wf3";

// 1 -- Demander son Email à l'utilisateur avec un prompt

    var emailLogin = prompt("Veuillez entrer votre email !", "Email");
        
    var mdpLogin = prompt( "Veuillez entrer le mot de passe pour accéder à cette page", "Mot de passe" );

// 2 -- Je vérifie si l'email saisi (emailLogin) correspond à celui en base de donnée (email)
    if(emailLogin == email && mdpLogin == mdp) {
        alert("Bienvenue");
} else {
       alert("Mot de passe ou identifiant incorrect!");
}


/*-----------------------------
LES OPERATEURS DE LOGIQUE
-----------------------------*/

// L'opérateur ET : &&
// -- Si la combinaison EmailLogin et email correspond ET ou AND la combinaison mdpLogin et mdp correspond
// -- Dans cette condition, les 2 doivent obligatoirement correspondre pour être valide.

if((emailLogin === email) && (mdpLogin === mdp)){...}

// L'opérateur OU : ||
// -- Si la combinaison EmailLogin et email correspond OU ou OR la combinaison mdpLogin et mdp correspond
// -- Dans cette condition, au moins l'une des deux doit correspondre pour être valide.

if((emailLogin === email) || (mdpLogin === mdp)){...}

// L'opérateur "!" : qui signifie le CONTRAIRE de, ou encore NOt

var isUserApproved = true;
if (!isUserApproved){ // Si l'utilisateur n'est pas approuvé.

}
// -- Reviens également à écrire:

if(isUserApproved == false) {
    
}












