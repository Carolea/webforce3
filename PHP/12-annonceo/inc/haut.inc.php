<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Annonceo</title>

  <!-- CSS BOOSTRAP -->

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- CSS ANNONCEO -->

  <link rel="stylesheet" href="inc/css/style.css">

  <!-- jQuery -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>

  <!-- JS BOOTSTRAP -->

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container">
      <nav class="navbar navbar-default">
      

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="./accueil.php">Annonceo</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="">Qui sommes-nous ?</a></li>
          <li><a href="">Contact</a></li>
        </ul>
        
        <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" onKeyPress="if(event.keyCode == 13) validerForm();" class="form-control" placeholder="Recherche...">
            </div>
          </form>
        
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Espace membre<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php if (internauteEstConnecte()): ?>
              <li><a href="profil.php">Profil</a></li>
              <?php else: ?>
              <li><a href="connexion.php">Connexion</a></li>
              <li><a href="inscription.php">Inscription</a></li>
              <?php endif;
          if (internauteEstConnecteEtEstAdmin()): ?>
              <li><a href="../admin/gestion_annonces.php">Gestion des annonces</a></li>
              <li><a href="../admin/gestion_categories.php">Gestion des catégories</a></li>
              <li><a href="../admin/gestion_commentaires.php">Gestion des commentaires</a></li>
              <li><a href="../admin/gestion_membres.php">Gestion des membres</a></li>
              <li><a href="../admin/gestion_notes.php">Gestion des notes</a></li>
              <li><a href="../admin/statistiques.php">Statistiques</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      </nav>
    <!-- /.container-fluid -->
    </div>

  <!-- main container -->
  <div class="container" style="min-height: 80vh;">
