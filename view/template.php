<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--feuille de style-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?= $title ?></title>
  </head>
  <body>

      <nav class="navbar navbar-expand-lg navbar-light <?php if ($_SESSION['admin']){?> nav-admin<?php }else{?> nav-custom<?php } ?>">
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=chapter">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']){?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=admin">Espace Administrateur</a>
              </li>
            <?php }else{?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=contact">Contact</a>
            </li>
            <?php } ?>
            <?php if (isset($_SESSION['pseudo'])) {?>
               <li class="nav-item">
                 <a class="nav-link" href="index.php?action=disconnection">déconnexion</a>
               </li>
            <?php }else{?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=login">Connexion/Inscription</a>
              </li>
            <?php } ?>

          </ul>
        </div>

      </nav>

    <?= $content ?>
  </body>
</html>
