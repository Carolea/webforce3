<?php

//--------------------
//Exercice
//--------------------
/*
-Créer un formulaire avec les champs ville, code postal, adresse.
-Afficher les données saisies par l'internaute, juste au-dessus du formulaire en précisant l'étiquette correspondant.
*/

echo '<pre>'; var_dump($_POST); echo '<pre>';

if(!empty($_POST)){ //si $_POST n'est pas vide c'est que le formulaire a été posté
    

echo 'Ville: ' . $_POST['ville'] . '<br>';
echo 'Code Postal: ' . $_POST['codepostal'] . '<br>';
echo 'Adresse: ' . $_POST['adresse'] . '<br>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire2</title>
</head>
<body>
   <h1>Formulaire 2</h1>
   
   <form method="post" action=""> 
      
       <label for="ville">Ville</label>
       <input type="text" id="ville" name="ville"> 
       <br>
       
       <label for="codepostal">Code Postal</label>
       <input type="text" id="codepostal" name="codepostal">
       <br>
       
       <label for="adresse">Adresse</label>
       <textarea name="adresse" id="adresse" cols="30" rows="10"></textarea>
       <br>
       
       <input type="submit" name="validation" value="Envoyer">
        
   </form>
    
</body>
</html>



