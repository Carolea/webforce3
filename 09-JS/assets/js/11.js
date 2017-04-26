/* -- 
Consigne : A partir du tableau fourni, vous devez mettre en place un système d'authentification. Après avoir demandé à votre utilisateur son EMAIL et MOT DE PASSE, et après avoir vérifié ses informations, vous lui souhaiterez la bienvenue avec son nom et prénom (document.write);

En cas d'échec, vous afficherez une ALERT pour l'informer de l'erreur.
Vous devrez préciser s'il s'agit d'une erreur au niveau du mail ou du mot de passe.
-- */

// Petite fonction de racourci (lesflemmards.js)

function w(t){
    document.write(t);
}
function l(e){
    console.log(e);
}

var BaseDeDonnées = [
    {'prenom':'Hugo','nom':'LIEGEARD','email':'wf3@hl-media.fr','mdp':'wf3'},
    {'prenom':'Rodrigue','nom':'NOUEL','email':'rodrigue@hl-media.fr','mdp':'wf3'},
    {'prenom':'Jean-Christophe','nom':'MONPLAISIR','email':'jc.monplaisir@hl-media.fr','mdp':'wf3'},
    {'prenom':'Nathanael','nom':'DORDONNE','email':'nathanael.d@hl-media.fr','mdp':'wf3'}
];



// 1 -- Demander son Email à l'utilisateur avec un prompt
var email, mdp;

    var emailLogin = prompt("Veuillez entrer votre email !", "Email");
        
    var mdpLogin = prompt( "Veuillez entrer le mot de passe pour accéder à cette page", "Mot de passe" );

// 2 -- Je vérifie si l'email saisi (emailLogin) correspond à celui en base de donnée (email)
    if(emailLogin == email && mdpLogin == mdp) {
        w("Bienvenue" + nom + prenom);
    if(emailLogin )
} else {
       alert("Mot de passe ou identifiant incorrect!");
}