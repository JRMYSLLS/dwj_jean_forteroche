<?php $title = 'Commentaires'; ?>

<?php ob_start(); ?>
<div class="container-fluid space">
  <div class="row">
    <?php include'admin.php'; ?>
    <div class="col-md-8">
      <h2><?=htmlspecialchars($results['title'])?></h2>
      <table class="table table-striped">
        <tbody>
          <?php foreach ($comments as $comment):?>
          <tr>
            <td><strong><?=htmlspecialchars($comment['author'])?></strong></td>
            <td><?= $comment['comment']?></td>
            <?php if($comment['status_comment']==0 OR $comment['status_comment']==1){?>
            <td><a href="index.php?action=validateComment&amp;id=<?=$comment['id']?>&amp;chapter=<?=$comment['id_chapter']?>&amp;return=view"><i class="far fa-check-circle"></i> Valider</a></td>
          <?php }else{ ?>
            <td></td>
          <?php } ?>
            <td><a href="index.php?action=deleteComment&amp;id=<?=$comment['id']?>&amp;chapter=<?=$comment['id_chapter']?>&amp;return=view" class="delete"><i class="fas fa-trash-alt"></i> Supprimer</a></td>

          </tr>
          <?php endforeach;?>
        </tbody>
      </table>

    </div>
  </div>
</div>
<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
