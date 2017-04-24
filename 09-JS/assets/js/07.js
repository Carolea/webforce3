/* --

Votre Mission,

Réaliser une fonction permettant à un internaute de :
- Saisir son Prénom dans un Prompt
- Retourner à l'Utilisateur : Bonjour [PRENOM], Quel âge as-tu?
- Saisir son Age
- Retourner à l'Utilisateur : Tu es donc né en [ANNEE DE NAISSANCE].
- Afficher ensuite un récapitulatif dans la page.
Bonjour [PRENOM], tu as [AGE] !

--*/


// 1 -- Initialisation des variables
var DateDuJour = new Date();

// 2 -- Création de la fonction
function Hello(){
    
    //2a. Je demande à l'utilisateur son prénom
    prenom = prompt("Saisissez votre prénom", "Prénom");
    
    //2b. Je demande son age
    // parseInt pour passer de string a number
    age    = parseInt(prompt("Bonjour " + prenom + "! Quel âge as-tu?"));
    
    //2c. J'affiche une alert avec son année de naissance
//    console.log(typeof age)
//    console.log(age)
    
    alert("Tu es donc né en " + (DateDuJour.getFullYear() - age) + "!");
    
    //2d. Affichage dans le html
    document.write("Bonjour " + prenom + ", tu as " + age + " ans !");
}

// 3 -- Execution de ma fonction

Hello();






