<?php $title = 'admin'; ?>

<?php ob_start(); ?>
<div class="container-fluid space">
  <div class="row">
    <?php include'admin.php'; ?>
    <div class="col-md-8">
      <p class="alert-danger">Commentaire(s) signalé(s)</p>
      <table class="table table-striped table-dark">
        <tbody>
          <?php foreach ($results as $result):?>
          <tr>
            <td><?=htmlspecialchars($result['comment'])?></td>
            <td><a href="index.php?action=validateComment&amp;id=<?=$result['id']?>">validez</a></td>
            <td><a href="index.php?action=deleteComment&amp;id=<?=$result['id']?>">supprimez</a></td>
          </tr>
          <?php endforeach;?>
        </tbody>
    </div>
  </div>
</div>
<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
