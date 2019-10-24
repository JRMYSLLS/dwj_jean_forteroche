<?php  $title = $results['title'];?>

<?php ob_start(); ?>

  <div class="container space">
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

  <table class="table table-striped">
    <tbody>
      <?php foreach ($comments as $comment):?>
      <tr>
        <td><strong><?=htmlspecialchars($comment['author'])?></strong> <br> <hr><?= $comment['comment']?> </td>
        <td><?php if (isset($_SESSION['pseudo']) && $comment['status_comment'] == 0) {?>
          <a href="index.php?action=reportComment&amp;id=<?=$comment['id']?>&amp;chapter=<?=$comment['id_chapter']?>"><p><i class="fas fa-exclamation-triangle"></i>Signaler</p></a>
        <?php }elseif($comment['status_comment'] == 2){?><i class="far fa-check-circle"></i><?php  } ?></td>

      </tr>
      <?php endforeach;?>
    </tbody>
  </table>

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
}else{?>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="card my-4">
          <h5 class="card-header">Pour laisser un commentaire veuillez vous <a href="index.php?action=login" class="lien">inscrire</a> et/ou vous <a href="index.php?action=login" class="lien">connecter</a>.</h5>

        </div>
      </div>
    </div>
  </div>
<p></p>
<?php }?>

<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
