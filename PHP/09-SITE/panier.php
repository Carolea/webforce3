<?php
require_once 'inc/init.inc.php';

////--------------TRAITEMENT--------------

//debug($_POST);

if(isset($_POST['ajout_panier'])){
    //si on a cliqué sur "ajouter au panier", on sélectionne les infos (prix) du produit en BDD:
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_POST['id_produit'])); //l'id produit vient du formulaire d'ajout au panier
    
    $produit = $resultat->fetch(PDO::FETCH_ASSOC);
    //id_produit donc un seul produit dans la requête donc pas de boucle while
    
    ajouterProduitDansPanier($produit['titre'], $produit['id_produit'], $_POST['quantite'], $produit['prix']); //le prix vient de la bdd pour éviter qu'il soit modifier dans le navigateur et envoyé côté serveur
    
    header('location:fiche_produit.php?statut_produit=ajoute&id_produit=' .$produit['id_produit']);
    exit();
    
}

//vider le panier:
if(isset($_GET['action']) && $_GET['action'] == 'vider'){
    //si on a cliquer sur le lien "vider le panier":
    unset($_SESSION['panier']); //on supprime le panier de la session
}

//supprimer un article du panier

if(isset($_GET['action']) && $_GET['action'] == 'supprimer_article' && isset($_GET['articleASupprimer'])){
    retirerProduit($_GET['articleASupprimer']);
}

//validation du panier

if(isset($_POST['valider'])){
    //si on a cliqué sur le bouton valider du panier:
    debug($_SESSION);
    
    $id_membre = $_SESSION['membre']['id_membre']; //l'id_membre est dans la SESSION à l'indice 'membre'
    
    $montant_total = montantTotal(); //qui return le total du panier
    
    //on insère la commande dans la table commande:
    executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES (:id_membre, :montant, NOW())", array(':id_membre' => $id_membre, ':montant' => $montant_total));
    
    //on récupère l'id_commande de la commande que l'on vit d'insérer pour pouvoir l'insérer ensuite dans la table details_commande.
    
    $id_commande = $pdo->lastInsertId();
    
    //on met à jour la table details_commande:
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
        $id_produit = $_SESSION['panier']['id_produit'][$i];
        $quantite = $_SESSION['panier']['quantite'][$i];
        $prix = $_SESSION['panier']['prix'][$i];
        
        executeRequete("INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES (:id_commande, :id_produit, :quantite, :prix)", array(':id_commande' => $id_commande, ':id_produit' => $id_produit, ':quantite' => $quantite, ':prix' => $prix ));
        
        //décrémente le stock de chq article
        executeRequete("UPDATE produit SET stock = stock - :quantite WHERE id_produit = :id_produit", array(':quantite' => $quantite, ':id_produit' => $id_produit));
        
    } //fin du for
    
    //suppression du panier:
    unset($_SESSION['panier']);
    
    $contenu .= '<div class="bg=success">Merci pour votre commande. Votre numéro de suivi est le '. $id_commande .' </div>';
    
}




////--------------AFFICHAGE---------------
require_once 'inc/haut.inc.php';

echo $contenu;

echo '<h2>Voici votre panier</h2>';

if(empty($_SESSION['panier']['id_produit'])){
    //Le panier est vide:
    echo '<p>votre panier est vide.</p>';
} else{
    //Le panier n'est pas vide:
    echo '<table class="table">';
        echo '<tr class="info">
                <th>Titre</th>
                <th>Référence</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Action</th>    
            </tr>';
        //On affiche les produits en parcourant $_SESSION['panier']
        for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
            //externaliser le count sous forme de variable pour optimiser le rendement//
            
            echo '<tr>';
                echo '<td>'. $_SESSION['panier']['titre'][$i] .'</td>';
                echo '<td>'. $_SESSION['panier']['id_produit'][$i] .'</td>';
                echo '<td>'. $_SESSION['panier']['quantite'][$i] .' ex</td>';
                echo '<td>'. $_SESSION['panier']['prix'][$i] .' €</td>';
                echo '<td>
                        <a href="?action=supprimer_article&articleASupprimer='.$_SESSION['panier']['id_produit'][$i] .'">Supprimer article</a>
                    </td>';
            
            
            echo '</tr>';
        }
    
    //La ligne du total du panier:
    echo '<tr class="info">
            <th colspan="3">Total</th>
            <th colspan="2"> '. montantTotal() .' €</th>
         </tr>';
    
    //Si internaute est connecté, on met le bouton de validation du panier:
    if(internauteEstConnecte()){
        echo '<form method="post" action="">;
                <tr class="text-center">
                    <td colspan="5">
                        <input type="submit" name="valider" value="valider le panier" class="btn">
                    </td>
                </tr>
            </form>';
    } else {
        echo '<tr class="text-center">
                    <td colspan="5">
                        Veuillez-vous <a href="inscription.php">inscrire</a> ou vous  <a href="connexion.php">connecter</a> afin de pouvoir valider le panier
                    </td>
                </tr>';
    }
    
    echo '<tr class="text-center">
            <td colspan="5">
                <a href="?action=vider">Vider mon panier</a>
            </td>
        </tr>';
    
    echo '</table>';
    
}

require_once 'inc/bas.inc.php';
