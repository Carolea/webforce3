<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.
    
    a)connexion à la bdd
    b)requête préparée
    c)fetch + while?
    d)affichage

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
*/
$contenu = '';

//connexion à la bdd
$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//requete en bdd
$query = $pdo->query("SELECT nom, prenom, telephone FROM contact");
$query->execute();

//pas obligé de faire un prepare vu que pas de données externes

while($contact = $query->fetch(PDO::FETCH_ASSOC)){
    $contenu .= '<tr>';
    
    $contenu .= '<td>' . $contact['nom'] . '</td>';
    $contenu .= '<td>' . $contact['prenom'] . '</td>';
    $contenu .= '<td>' . $contact['telephone'] . '</td>';
    $contenu .= '<td><a href="?id_contact='. $contact['id_contact'] .'">Autres Infos</a></td>';
 
    $contenu .= '</tr>';
}

//détail:
if(isset($_GET['id_contact'])){
    //get donc prepare
    $query = $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
    $query->bindParam(':id_contact', $_GET['id_contact'], PDO::PARAM_STR);
    $query->execute();
    
    $contact = $query->fetch(PDO::FETCH_ASSOC);
    
    $contenu .= '<p>Nom : '. $contact['nom'] .'</p>';
    $contenu .= '<p>Prénom : '. $contact['prenom'] .'</p>';
    $contenu .= '<p>Téléphone : '. $contact['telephone'] .'</p>';
    $contenu .= '<p>Email : '. $contact['email'] .'</p>';
    $contenu .= '<p>Type de contact : '. $contact['type_rencontre'] .'</p>';
    $contenu .= '<p>Année : '. $contact['annee_rencontre'] .'</p>';
    
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste de Contacts</title>
</head>
<body>
   
   <table border="1">
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Autres Infos</th>   
      </tr>
      
    <?php
    
       echo $contenu;
       
    ?>
      
    </table>
    
</body>
</html>