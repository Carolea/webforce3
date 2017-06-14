<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. 

   2- Vous créez une fonction prixLoc qui calcule le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. Elle retourne la chaine "La location de votre véhicule sera de X euros pour Y jour(s)." où X et Y sont variables.

   4- Lorsque le formulaire est soumis, vous affichez le résultat.
 
*/

$categorie = array('30' => 'A', '50' => 'B', '70' => 'C', '90' => 'D');


function prixLoc($categorie, $nbrJrLoc){
    
    switch ($categorie) {
        case 'A':
            $categorie = 30;
            break;
        case 'B':
            $categorie = 50;
            break;
        case 'C':
            $categorie = 70;
            break;
        case 'D':
            $categorie = 90;
            break;
        default:
            echo "Format invalide.";
    }
    
    return prixLoc ($_POST['categorie'] * $_POST['nbrJrLoc']);
 
}

echo 'La location de votre véhicule sera de ' . prixLoc . ' euros pour ' . $nbrJrLoc . ' jour(s)';


?>


<!--FORMULAIRE HTML-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Restaurants</title>
    
    <style>label {
	display: block;
	width: 150px;
	float: left;
    }
    </style>
    
</head>
<body>
      <!--Mise en place du formulaire-->
   <h1>Formulaire</h1>
   
   
   <form method="post" action="">
       
        <label for="categorie">Véhicule de Location</label>
            <select name="categorie" id="categorie">
                
				<?php 
				foreach($categorie as $key => $value){
					echo '<option value="'. $value .'">'. $value .'</option>';
				} 
				?>
            	
			</select>
        <div></div>
       
        <label for="nbrJrLoc">Nombre de Jours de Location</label>
        <input type="text" id="nbrJourLoc" name="nbrJourLoc">
        <div></div>
        
        
        <input type="submit" value="Envoyer">
       
   </form>
    
</body>
</html>

