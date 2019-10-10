<?php $title = 'Chapitres'; ?>

<?php ob_start(); ?>

<div class="container-fluid">
  <div class="row">
    <?php include'admin.php'; ?>

    <div class="col-md-9">
      <?php foreach ($results as $result):?>
      <div class="chapter-custom jumbo-custom jc">
        <h2><?=htmlspecialchars($result['title'])?></h2>
        <hr >
        <div class="col-md-4 d-flex justify-content-around">
          <a href="index.php?action=editChapter&amp;id=<?=$result['id']?>">Modifier</a>
          <a href="index.php?action=deleteChapter&amp;id=<?=$result['id']?>">Supprimer</a>
        </div>
      </div>
      <?php endforeach;?>
    </div>

  </div>
</div>



<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
