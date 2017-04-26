/* -- CONSIGNE :

I. Créer un Tableau 3D "PremierTrimestre" contenant la moyenne d'un étudiant pour plusieurs matières.

Nous aurons donc pour un étudiant, sa moyenne à plusieurs matières.

Par exemple : Hugo LIEGEARD : [Francais : 12, Math : 19, Physique : 4], ...ect

Vous allez créez au minimum 5 étudiants.

II. Afficher sur la page (à l'aide de document.write) pour chaque étudiant, la liste (ul et li) de sa moyenne à chaque matière, puis sa moyenne générale.

-- */


// Petite fonction de racourci (lesflemmards.js)

function w(t){
    document.write(t);
}
function l(e){
    console.log(e);
}

// -- Création de mon Tableau 3D en JS [tableau] {objet}

var PremierTrimestre = [
    {
        "nom"     : "LIEGEARD",
        "prenom"  : "Hugo",
        "moyenne" : {
            "francais" : 4,
            "math"     : 8,
            "physique" : 18
        }
        
    },
    {
        "nom"     : "IHADADENE",
        "prenom"  : "Karim",
        "moyenne" : {
            "francais" : 8,
            "math"     : 18.5,
            "physique" : 18
        }
    },
    {
        "nom"     : "HERICOURT",
        "prenom"  : "Rudy",
        "moyenne" : {
            "francais" : 10.5,
            "math"     : 8,
            "physique" : 18
        }
    }
]

// -- Apercu dans la console
l(PremierTrimestre);

w('<ol>')
// -- Je veux afficher la liste des étudiants
for(i=0; i < PremierTrimestre.length; i++){
    
 
    
    // -- on récupère l'objet Etudiant de l'itération
    var Etudiant = PremierTrimestre[i];
    
    // -- Aperçu dans la console.
    l(Etudiant);    
    
    var NombreDeMatiere = 0, SommeDesNotes = 0;
    
    //-- Afficher nom & prenom d'un étudiant [i] part de 0 et fait toute la liste
//    var Etudiant = PremierTrimestre[i]; [j] renvoi les indices de la liste moyenne
    w("<li>")
    w(Etudiant.prenom + " " + Etudiant.nom);
//    for( var j in Etudiant[i].moyenne) ou
    w("<ul>")
      for(var matiere in Etudiant.moyenne) {
//        1(Etudiant.moyenne[matiere]);
          NombreDeMatiere++;
          SommeDesNotes += Etudiant.moyenne[matiere];
          
          w("<li>")
            w(matiere + " : " + Etudiant.moyenne[matiere]);
          w("</li>")
      } // -- Fin de la boucle matière pour avoir toutes les matières
    
        // -- Affichage de la moyenne
    w("<li>")
        w("<strong>Moyenne Générale :</strong> " + (Math.round(SommeDesNotes / NombreDeMatiere)));
    w("</li>")
    
    w("</ul>")
//    for(var j in PremierTrimestre[i].moyenne){
//        l(j);
//    }
    w("</li>")
//    ou
//    w(PremierTrimestre[i].prenom + " " + PremierTrimestre[1].nom);

w('</ol>')
}































