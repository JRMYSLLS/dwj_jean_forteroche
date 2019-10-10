<?php $title = 'admin'; ?>

<?php ob_start(); ?>
<div class="container-fluid">
  <div class="row">
    <?php include'admin.php'; ?>
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
  </div>
</div>
<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
