<?php
require_once('inc/init.inc.php');

//-----------------TRAITEMENT---------------------

//1- Affichage des catégories
$categories = executeRequete("SELECT DISTINCT categorie FROM produit");

$contenu_gauche .= '<p class="lead">Vêtements</p>';
$contenu_gauche .= '<div class="list-group">';
    $contenu_gauche .= '<a href="?categorie=all"> Tous </a>';

while($cat = $categories->fetch(PDO::FETCH_ASSOC)){ //boucle while car plusieurs catégories
    //debug($cat;)
    $contenu_gauche .= '<a href="?categorie='. $cat['categorie'] .'" class="list-group-item">'. $cat['categorie'] .'</a>';
}

$contenu_gauche .= '</div>';

//2- Affichage des produits en fonction de la catégorie choisie:
if(isset($_GET['categorie']) && $_GET['categorie'] != 'all'){
    $donnees = executeRequete("SELECT * FROM produit WHERE categorie = :categorie", array(':categorie' => $_GET['categorie'])); //on sélectionne les produits de la catégorie choisie.
} else {
    $donnees = executeRequete("SELECT * FROM produit");
}

while($produit = $donnees->fetch(PDO::FETCH_ASSOC)){
    $contenu_droite .= '<div class="col-sm-4 col-lg-4 col-md-4">';
        $contenu_droite .= '<div class="thumbnail">';
            $contenu_droite .='<a href="fiche_produit.php?id_produit='. $produit['id_produit'] .'"><img src="'. $produit['photo'] .'" width="130" height="100"></a>';
    //lien d'origine donc avant le ?/get
            $contenu_droite .= '<div class="caption">';
                $contenu_droite .= '<h4 class="pull-right">'. $produit['prix'] .' €</h4>';
                $contenu_droite .= '<h4>'. $produit['titre'] .'</h4>';
                $contenu_droite .= '<p>'. $produit['description'] .'</p>';
    
    
    
            $contenu_droite .= '</div>';
        $contenu_droite .= '</div>';
    $contenu_droite .= '</div>';
}




//-----------------AFFICHAGE---------------------
require_once 'inc/haut.inc.php';
echo $contenu;
?>

    <div class="row">
       <div class="col-md-3">
           <?php echo $contenu_gauche; ?>
       </div>
        
        <div class="col-md-9">
            <div class="row">
                <?php echo $contenu_droite; ?>
            </div>
        </div>
        
        
        
    </div>



<?php
require_once 'inc/bas.inc.php';





