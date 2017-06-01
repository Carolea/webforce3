<?php

//--------------------
//Exercice: 
/*
Créer un formulaire qui permet d'enregistrer un nouvel employé dans la base de données de "entreprise", en écrivant le code suivant:

1- Création du formulaire HTML
2- Connexion à la bdd
3- Lorsque le formulaire est posté, insertion des données du formulaire dans la base avec une requête préparée
4- Afficher un message "L'employé a bien été ajouté."

*/
$message = ''; //qu'on insere dans le html

/*Connexion à la bdd*/
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


/*Vérifier que le formulaire a été envoyé*/
if(!empty($_POST)){
    //contrôle du formulaire donc condition
    if (strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .='Le prénom doit comporter entre 3 et 20 caractères <br>'; //.= ajoute le txt a ce qu'il y a déjà. $message est une Variable pour afficher les messages.
    
    if (strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .='Le nom doit comporter entre 3 et 20 caractères <br>'; 
    
    if (strlen($_POST['service']) < 3 || strlen($_POST['service']) > 20) $message .='Le service doit comporter entre 3 et 20 caractères <br>'; 
    
    if (strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .='Le prénom doit comporter entre 3 et 20 caractères <br>'; 
    
    if($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f') $message .= 'Le sexe n\'est pas correct <br>';
    
    if(!is_numeric($_POST['salaire']) <= 0) $message .= 'Le salaire doit être un nombre supérieur à 0 <br>'; //is_numeric vérifie si c'est nombre décimal ou pas
    
    //contrôle de la date
    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date); //Crée un objet date au format indiqué dans $format, ou bien retourne false si la date fournie ne respecte pas le format fourni. ($format/$date passent en parametre de la fonction) Y-m-d par defaut pas besoin de préciser
        
        if($d && $d->format($format) == $date){ //si la date n'est pas validée = false si validée vérif format. Si on rentre le 30 fevrier, il sera transfo en 2mars pour compenser la date qui n'existe pas. Sur la 2ème vérif si le format (2mars) ne correspond pas a $date entrée (30fev) beh false.
        //la date est correcte si $d vaut true (sinon c'est que $date ne respecte pas le format fourni) ET que l'objet $d formaté est identique à la date fournie (sinon que l'on a donné par exemple 1975-02-30 au lieu de 1975-03-02)
            return true;
        } else {
            return false;
        }
        /*return($d && $d->format($format) == $date); mettre la condition du dessus*/
    }
    
    if(!validateDate($_POST['date_embauche'])) $message .= 'Date incorrecte! <br>';
    
    if(empty($message)){ //si message vide pas d'erreur
        
    
    echo 'L\'employé a bien été ajouté.';

    /*Insertion des données dans la bdd/ Requête préparée*/
    $resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, date_embauche, service, salaire) VALUES (:prenom, :nom, :sexe, :date_embauche, :service, :salaire)");
        //sql, string que l'on passe en argument donc ""
        //marqueur ni varchar ni string donc pas ''
        
    /*Lien marqueur / valeur*/
    $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        //optionnel les : avant marqueur et PDO::PARAM_STR
    $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
    $resultat->bindParam(':date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
    $resultat->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
    $resultat->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_STR);
        
        
    /*Execution de la requête*/
    $resultat->execute();
    }
}

?>

<!--Formulaire en HTML-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    
    
<style>
    label
{
	display: block;
	width: 150px;
    /*float: left;*/
}

</style>
</head>
<body>
   <h1>Formulaire</h1>
   <?php echo $message; ?>
   <form method="post" action=""> 
     
       <label for="prenom">Prénom</label>
       <input type="text" id="prenom" name="prenom"> 
       <br>
       
       <label for="nom">Nom</label>
       <input type="text" id="nom" name="nom"> 
       <br>
        
        <label for="sexe">Sexe</label> 
        <input type="radio" name="sexe" value="M" checked> Homme<br> 
        <input type="radio" name="sexe" value="F"> Femme<br> <!--value m/f pour myadmin format enum-->
       <br>
            
        <label for="date_embauche">Date D'embauche</label>
       <input type="text" id="date_embauche" name="date_embauche" placeholder="YYYY-MM-JJ"> 
       <br>   
          
        <label for="service">Service</label>
       <input type="text" id="service" name="service"> 
       <br>
          
        <label for="salaire">Salaire</label>
       <input type="text" id="salaire" name="salaire"> 
       <br>
       
       <input type="submit" value="Envoyer">
        
        
   </form>
    
</body>
</html>