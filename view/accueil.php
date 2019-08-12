<?php $title='Accueil' ?>

<?php ob_start(); ?>



  <div class="container">
    <div class="row">
      <?php foreach ($results as $result):?>
      <div class="col-lg-6 chapter-custom">
        <div class="jumbotron">
          <h1 class="display"><?=htmlspecialchars($result['title'])?></h1>
          <p class="lead"><?= substr($result['content'],0,40)?>...</p>
          <hr class="my-4">
          <p class="lead">
            <a href="index.php?action=viewChapter&amp;id=<?=$result['id']?>">Lire la suite</a>
          </p>

        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>

<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
