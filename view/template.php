<?php $message = new \forteroche\controller\MessageFlash(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--feuille de style-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
    <script src="https://cdn.tiny.cloud/1/gwket3rny82mwscjm9r85vgkatvwp1vlcf55g6gyb0enkvjy/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({ entity_encoding : "raw", selector:'#texte' });</script>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
    <script src="./public/js/main.js"></script>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title><?= $title ?></title>
  </head>
  <body>
<?php $message->getFlash(); ?>

      <nav class="navbar navbar-expand-lg navbar-light fixed-top <?php if (isset($_SESSION['admin']) && $_SESSION['admin']){?>nav-admin<?php }else{?>nav-custom<?php }?>" id="mainNav">
        <div class="container">
          <a class="navbar-brand link-custom" href="index.php?action=chapter">J.Forteroche</a>

          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link link-custom" href="index.php?action=chapter">Accueil</a>
              </li>
              <?php if (isset($_SESSION['admin']) && $_SESSION['admin']){?>
                <li class="nav-item">
                  <a class="nav-link nav-link link-custom" href="index.php?action=admin">Espace Administrateur</a>
                </li>
              <?php }?>
              <li class="nav-item">
                <?php if (isset($_SESSION['pseudo'])) {?>
                <a class="nav-link link-custom" href="index.php?action=disconnection">Déconnexion</a>
                <?php }else{?>
                <a class="nav-link link-custom" href="index.php?action=login">Connexion / Inscription</a>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>



    <?= $content ?>
  </body>
</html>
