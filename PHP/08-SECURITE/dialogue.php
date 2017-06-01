<?php
//--------------------------------------
//Cas Pratique: un espace de dialogue
//--------------------------------------

/*
On va créer un espace de dialogue de type avis ou livre d'or.

Base de données : dialogue
Table :commentaire 
Champs : id_commentaire int(3) PK AI
         pseudo VARCHAR (20)
         message TEXT (limite intégré de +65k caractères)
         date_enregistrement DATETIME
         
*/

//connection à la bdd
$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//Si le formulaire est posté
if(!empty($_POST)){ 
    
    //-3 Traitement contre les failles XSS et les injections CSS : échapper les données
    //Exemple de faille css <style>body{display:none}</style> fait disparaitre la page html chez le client. La page est blanche
    //supprimer le message pour récupérere le site
    //Exemple de faille XSS (X=cross S=site S=script/faille javascript) <script>while(true){alert('vous êtes bloqué);}</script> //avec ou sans {}
    
    //Pour s'en prémunir, bloque les caractères spéciaux & < > "" '' et les transforme en entité html &amp &lt &gt. On parle d'échappement des donnes (fait partie de l'assainissement des données):
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
    $_POST['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);
    
    
    //Compléments: 
    $_POST['message'] = strip_tags($_POST['message']); //supprime toutes les balises html contenues dans $_POST['message']
    
    //htmlentities() permet aussi de convertir en entité html les caractères spéciaux lorsqu'on fait un echo direct de données issues de l'internaute.
    
    
    
    
    //1- Dans un 1er temps on fait une requête qui n'est pas protégé contre les injections. !! La requête n'accepte pas les apostrophes.
  /*  $r = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES('$_POST[pseudo]', NOW(), '$_POST[message]')");*/
    
    //injection sql dans le champ message de --   ok'); DELETE FROM commentaire; ( -- remplace $_POST[message]. Pour s'en prémunir, faire une requête préparée.
    
    $stmt = $pdo->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES(:pseudo, :message, NOW())");
    
    $stmt ->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $stmt ->bindParam(':message', $_POST['message'], PDO::PARAM_STR);
    
    $stmt->execute();
    //2- l'injection sql ne fonctionne plus car on a mis des marqueurs dans requête dont blindParam. On peut désormais aussi mettre des ' dans le message
}

?>

    <h2>Formulaire</h2>

<form method="post" action="">
    
    
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo"><br>
    
    <label for="message">Message</label>
    <textarea name="message" id="message"></textarea>
    
    <input type="submit" name="envoi" value="Envoyer">
    
 
</form>

<?php
//affichage des messages postés:

$resultat = $pdo->query("SELECT pseudo, message, date_enregistrement FROM commentaire ORDER BY date_enregistrement DESC");

echo'Nombre de Commentaires : ' . $resultat->rowCount();

while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<div>';
        echo '<div> Pseudo: ' . $commentaire['pseudo'] . ', le ' . $commentaire['date_enregistrement'] . '</div>';
        echo '<div> Message: ' . $commentaire['message'] . '</div>';
    echo '</div><hr>';
}

