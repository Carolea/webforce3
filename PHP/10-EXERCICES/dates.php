<?php
/*
    1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
      Cette fonction prend 2 paramètres : une date et le format de conversion "US" ou "FR"
	  
	2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
*/

//on déclare la variable avec la fonction prédéfinie

//on déclare la fonction
function conversion($date, $format){
    
$objetdate = new DateTime($date);
    
    switch ($format) {
        case 'us':
            echo $objetdate->format('Y-m-d');
            break;
        case 'fr':
            echo $objetdate->format('d-m-Y');
            break;
        default:
            echo "Ceci n'est pas un format valide.";
    }

}

    echo conversion ('10-12-1985', 'us');
    echo conversion ('1985-12-10','fr');
    echo conversion ('1985-12-10', 'pantin');


/*function conversion($date, $format){
    
$objetdate = new DateTime($date);
    
    echo '<pre>';print_r(get_class_methods($objetDate)); echo '</pre>';
    
    if($format == 'FR'){
        return $objetDate->format('d-m-Y');
    } elseif($format == 'US'){
        return $objectDate->format('Y-m-d');
    } else{
        return 'Erreur sur le format demandé';
    }
    
}

    echo conversion ('10-12-1985', 'us');
    echo conversion ('1985-12-10','fr');
    echo conversion ('1985-12-10', 'pantin');*/