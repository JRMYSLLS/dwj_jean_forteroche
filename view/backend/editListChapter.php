<?php $title = 'Chapitres'; ?>

<?php ob_start(); ?>

<div class="container-fluid space">
  <div class="row">
    <?php include'admin.php'; ?>

    <div class="col-md-9">
      <h3>Tous les chapitres</h3>
      <table class="table table-striped">
        <tbody>
          <?php foreach ($results as $result):?>
          <tr>
            <td><?=$result['title']?></td>
            <td><?php if($result['countComs']==0){
              ?>Aucun commentaire
            <?php } elseif ($result['countComs']>0){ ?>
              <a href="index.php?action=allCommentView&amp;id=<?=$result['id']?>">Voir les commentaires (<?=$result['countComs']?>)</a>
              <?php }?></td>
            <td><a href="index.php?action=editChapterView&amp;id=<?=$result['id']?>"><i class="fas fa-edit"></i> Modifier</a></td>
            <td><a href="index.php?action=deleteChapter&amp;id=<?=$result['id']?>"><i class="fas fa-trash-alt"></i> Supprimer</a></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>

  </div>
</div>




<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
