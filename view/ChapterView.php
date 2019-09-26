<?php  $title = $results['title'];?>

<?php ob_start(); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2><?=htmlspecialchars($results['title'])?></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <p><?= $results['content']?></p>
      </div>
    </div>
  </div>
  <div class="container">
<?php foreach ($comments as $comment):?>
  <div class="commentaires_custom">
    <div class="row justify-content-between align-items-center comment_barre">
      <div class="col-6">
        <p class="text-left"><?=htmlspecialchars($comment['author'])?></p>
      </div>
      <div class="col-6">
        <p class="text-right"><?php if (isset($_SESSION['pseudo']) && $comment['validate_comment'] == 0) {?>
          <a href="index.php?action=reportComment&amp;id=<?=$comment['id']?>&amp;chapter<?=$comment['id_chapter']?>">signaler</a>
        <?php } ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <p><?= $comment['comment']?></p>
      </div>
    </div>
  </div>
  <?php endforeach;?>
  </div>
<?php
if (isset($_SESSION['pseudo'])) {?>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="card my-4">
          <h5 class="card-header">Laisser un commentaire:</h5>
            <div class="card-body">
              <form action="index.php?action=comment&amp;id=<?= $results['id'] ?>" method="post">
                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                  <button type="submit" name="commentPost" class="btn btn-primary">Valider</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
 ?>

<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
