<?php
/*
	1- Afficher dans une table HTML la liste des restaurants avec les champs nom et téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".



*/
$contenu = '';


// 1- Connexion à la BDD :
$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// 2- Requête en BDD :
$query = $pdo->query("SELECT * FROM restaurant");

$contenu .= '<table border="1">';
	$contenu .= '<tr>
					<th>Nom</th>
					<th>Téléphone</th>
					<th>Autres infos</th>
				 </tr>';

	while($restaurant = $query->fetch(PDO::FETCH_ASSOC)){
		// echo '<pre>'; print_r($contact); echo '</pre>';
        //pas de possibilité d'injection css donc query donc pas besoin de la ligne execute
		$contenu .= '<tr>
						<td>'. $restaurant['nom'] .'</td>
						<td>'. $restaurant['telephone'] .'</td>
						<td>
						<a href="?id_restaurant='. $restaurant['id_restaurant'] .'">autres infos</a>
						</td>	
					 </tr>';
	}

$contenu .= '</table>';

//renvoyer vers la page pour eval a href="eo.php?id_restaurant

// Détail :
if(isset($_GET['id_restaurant'])){
    
    $_GET['id_restaurant'] = htmlspecialchars($_GET['id_restaurant']); //securisé le get

	$query = $pdo->prepare("SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant");
	$query->bindParam(':id_restaurant', $_GET['id_restaurant'], PDO::PARAM_INT); //!!!int
	$query->execute();

	$restaurant = $query->fetch(PDO::FETCH_ASSOC);
	//echo '<pre>'; print_r($contact); echo '</pre>';
    
    $contenu .= '<h1>Détail Du Restaurant</h1>';
    
    if(!empty($restaurant)){
        
    
	$contenu .= '<p>Nom : '. $restaurant['nom'] .'</p>';
	$contenu .= '<p>Adresse : '. $restaurant['adresse'] .'</p>';
	$contenu .= '<p>Téléphone : '. $restaurant['telephone'] .'</p>';
	$contenu .= '<p>Type : '. $restaurant['type'] .'</p>';
	$contenu .= '<p>Note: '. $restaurant['note'] .'</p>';
	$contenu .= '<p>Avis: '. $restaurant['avis'] .'</p>';
        
    } else {
        $contenu .= '<div>Ce restaurant n\'existe pas</div>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste des Restaurants</title>
</head>
<body>

	<?php echo $contenu; ?>

</body>
</html>
