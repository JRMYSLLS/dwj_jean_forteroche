<?php $title = 'admin'; ?>

<?php ob_start(); ?>

<?php if (isset($_SESSION['id']) && $_SESSION['id']==0){ ?>
  <p>Bienvenue</p>
<?php }else{?>
<p>Vous n'avez pas acces à cet espace</p>
<?php } ?>

<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
