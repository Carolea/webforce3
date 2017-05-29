<?php
//-----------------------
//La superglobale $_POST
//-----------------------
/*
$_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire.

$_POST est une superglobale, donc est un array et est disponible dans tous les contextes du script, y compris au sein des fonctions sans faire global $_POST.

Syntaxe de l'array : $_POST = array("name1" => "valeur de l'input", "name2" => "valeur de l'input2");

name = indice
*/

echo '<pre>'; var_dump($_POST); echo '<pre>'; //pour vérifier que le formulaire fonctionne et envoie les infos.

if(!empty($_POST)){ //si $_POST n'est pas vide c'est que le formulaire a été posté
    
//Pour afficher les données du formulaire:
echo 'Prénom: ' . $_POST['prenom'] . '<br>';
//L'indice de POST correspond au name du formulaire
echo 'Description: ' . $_POST['description'] . '<br>';
}

//Pour réinitialiser un formulaire a 0 taper entré dans l'url avec juste refresh les 1ere données entrées restent.

//Chaque chose a une valeur implicite true or false.
// if($_POST){} existe = if(!empty($_POST))

//!empty, si formulaire vide il crée quand meme prenom et description
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon Formulaire</title>
</head>
<body>
   <h1>Formulaire 1</h1>
   
   <form method="post" action=""> 
      <!--method = comment vont circuler les informations (get possible mais peu utilisé. action = url de destination des données du post (si par exemple on veut rediriger sur une autre page)Si action est vide les données circulent vers la page du formulaire.  -->
       <label for="prenom">Prénom</label>
       <input type="text" id="prenom" name="prenom"> 
       <!--Les attributs name permettent de remplir les indices de $_POST.-->
       <br>
       
       <label for="description">Description</label>
       <!--L'attribut for est là pour des raisons d'accessibilité. quand on clique sur l'étiquette/le label, le curseur se positionne dans l'input id correspondant-->
       
       <textarea name="description" id="description" cols="30" rows="10"></textarea>
       <br>
       
       <input type="submit" name="validation" value="Envoyer">
        
   </form>
    
</body>
</html>


