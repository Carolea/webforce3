<?php
//---------------
//Exercice:

/*
1. Réaliser un formulaire permettant de sélectionner un fruit dans une liste déroulante et de saisir un poids dans un input.
2. Traiter les informations du formulaire pour afficher le prix du fruit choisi et du poids saisi, toujours en passant par la fonction calcul().
*/

echo '<pre>'; var_dump($_POST); echo '<pre>';

include('fonction.inc.php');

/*if(isset($_POST['fruit'])) echo calcul($_POST['fruit'], $_POST['poids']); déprécié*/

if(!empty($_POST)){
    //si le formulaire est osumis, $_POST n'est pas vide
    echo calcul($_POST['fruit'], $_POST['poids']);
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Fruits/Menu déroulant</title>
</head>
<body>

   
    <label for="fruit">Nos Fruits:</label>
        <form method="post" action="" >
           
            <select name="fruit">
                <option value="">-- Sélectionnez --</option>
                <option value="cerises">Cerises</option>
                <option value="bananes">Bananes</option>
                <option value="pommes">Pommes</option>
                <option value="peches">Pêches</option>
            </select>
            <br>
               <input type="text" name="poids" placeholder="entrez le poids en gramme"> 
               
            <input type="submit" value="Calculer">
            
        </form>
        
</body>
</html>