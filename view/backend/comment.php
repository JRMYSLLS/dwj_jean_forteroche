<?php $title = 'admin'; ?>

<?php ob_start(); ?>
<div class="container-fluid space">
  <div class="row">
    <?php include'admin.php'; ?>
    <div class="col-md-8">
      <p class="alert-danger">Commentaire(s) signalé(s)</p>
      <table class="table table-striped">
        <tbody>
          <?php foreach ($results as $result):?>
          <tr>
            <td><?=$result['comment']?></td>
            <td><a href="index.php?action=validateComment&amp;id=<?=$result['id']?>"><i class="far fa-check-circle"></i> Validez</a></td>
            <td><a href="index.php?action=deleteComment&amp;id=<?=$result['id']?>"><i class="fas fa-trash-alt"></i> Supprimez</a></td>
          </tr>
          <?php endforeach;?>
        </tbody>
    </div>
  </div>
</div>
<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
