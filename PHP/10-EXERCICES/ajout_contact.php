<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone VARCHAR(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

//Connection à la bdd
$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//Contrôle de validité du formulaire
if($_POST){
    $contenu = '';
    
    if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
        $contenu .= '<p>Le nom doit contenir entre 2 et 20 caractères.</p>';

    }
    
    if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
        $contenu .= '<p>Le prénom doit contenir entre 2 et 20 caractères.</p>';
    }
    
    if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
        $contenu .= '<p>Le téléphone n\'est pas valide.</p>';
    }
    
    if(!preg_match('#^[0-9]{4}$#', $_POST['annee_rencontre'])){
        $contenu .= '<p>L\'année de rencontre n\'est pas valide.</p>';
    }
    
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $contenu .= '<p>L\'email n\'est pas valide</p>';
    }
    
    if(!isset($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre')){
        $contenu .= '<p>Le type de contact n\'est pas valide</p>'; 
    }
    
    
$_POST['prenom'] = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
$_POST['nom'] = htmlspecialchars($_POST['nom'], ENT_QUOTES);
    
    
//Ajout de contact à la bdd si le formulaire passe la validation
    
    if(empty($contenu)){  
        
        
            $contenu .= '<p>Le formulaire est bien rempli.</p>';
    }
    
}


?>

<!--FORMULAIRE HTML-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
    
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
   
   <?php    echo $contenu;    ?>
   
   <form method="post" action="">
       
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom">
        <div></div>
        
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom">
        <div></div>
        
        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone">
        <div></div>
        
        <label for="annee_rencontre">Année de Rencontre</label>
        
    <?php    
           echo '<select name="annee_rencontre" id="annee_rencontre">';
                /*for($j = 2017; $j >= 1917 ; $j--){
                    print "<option>$j<option>";
                }*/
       
                for($i=date('Y'); $i>=date('Y')-100; $i--){
                    echo '<option value="'. $i .'">'. $i .'</option>';
                }
       
           echo '<select>';
    ?>
        <div></div>
        
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <div></div>
        
        <label for="type_contact">Type de Contact</label> 
        <select name="type_contact" id="type_contact">
            <option value="ami">Ami</option>
            <option value="famille">Famille</option>
            <option value="professionnel">Professionnel</option>
            <option value="autre">Autre</option>
        </select>
        <div></div>
        
        <input type="submit" value="Envoyer">
       
   </form>
    
</body>
</html>