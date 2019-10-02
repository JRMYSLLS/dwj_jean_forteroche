<?php $title = 'admin'; ?>

<?php ob_start(); ?>

<?php if (isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
  <div class="contenair">
    <div class="row panel">
      <div class="col-md-4">
        <p>Commentaire(s) signalé(s)</p>
        <?php foreach ($results as $result): ?>
          <div class="signComment">
            <?=$result['comment']?>
            <p><a href="index.php?action=validateComment&amp;id=<?=$result['id']?>">validez</a> <a href="index.php?action=deleteComment&amp;id=<?=$result['id']?>">supprimez</a></p>
          </div>
          <hr>
        <?php endforeach; ?>
      </div>
      <div class="col-md-8">
        <p>test</p>
      </div>
    </div>
  </div>
<?php }else{?>
<p>Vous n'avez pas acces à cet espace</p>
<?php } ?>

<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
