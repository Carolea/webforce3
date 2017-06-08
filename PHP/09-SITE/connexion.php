<?php
require_once 'inc/init.inc.php';

////--------------TRAITEMENT---------------
//déconnexion de l'internaute à sa demande
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    session_destroy(); //rappel: cette instruction est exécutée à la fin du script
}

//internaute est déjà connecté:
if(internauteEstConnecte()){
    //on le renvoie vers la page de profil:
    header('location:profil.php'); //permet d'envoyer un entête au nav client. On envoie une redirection vers la page profil.
    exit(); //on quitte/stop le script,  
}

//traitement du formulaire:
if($_POST){ //ou if(!empty...)
    //si le formulaire est soumis:
    //controle du formulaire:
    if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) $contenu .= '<div class="bg-danger">Le pseudo est requis</div>';
    
    if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) $contenu .= '<div class="bg-danger">Le mot de passe est requis</div>';
    
    if(empty($contenu)){ //donc pas de message d'erreur
        $mdp = md5($_POST['mdp']); //on crypte le mdp pour le comparer à celui de la bdd
        
        $resultat = executeRequete("SELECT * FROM membre WHERE mdp = :mdp AND pseudo = :pseudo", array(':mdp' => $mdp, ':pseudo' => $_POST['pseudo']));
        
        if($resultat->rowCount() != 0){
            //si il y a une ligne dans le résultat de la requête, alors le membre est bien inscrit avec les bons login et mdp
            
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car il n'y a qu'un seul membre possedant les login/mdp corrects
            
            /*debug($membre);*/
            
            $_SESSION['membre'] = $membre; //deverse un array dans un autre. On crée une session membre avec les éléments provenant de la bdd
            
            /*debug($_SESSION);*/
            header('location:profil.php'); //le membre étant connecté on l'envoi vers son profil
            exit();
            
            
        } else {
            $contenu .= '<div class="bg-danger">Erreur sur les identifiants</div>';  
        }
            
    } 
}







//--------------AFFICHAGE---------------
require_once 'inc/haut.inc.php';
echo $contenu;
?>
    <h3>Veuillez renseigner vos identifiants pour vous connecter</h3>
        <form method="post" action="">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" name="pseudo" id="pseudo"><br><br>
            
            <label for="mdp">Mot de Passe</label><br>
            <input type="password" name="mdp" id="mdp"><br><br>
            
            <input type="submit" value="se connecter" class="btn">  
            
        </form>

<?php
require_once 'inc/bas.inc.php';



