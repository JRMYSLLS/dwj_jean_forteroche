<?php $title='Accueil' ?>

<?php ob_start(); ?>

  <div>
    <div class="prout">
      <div>
        <div class="container-fluid banniere-custom">
          <div class="row">
              <img src="./public/images/hero-region-alaska.jpg" alt="">
          </div>
        </div>
      </div>

      <div class="d-flex flex-row">

          <div class="col-md-12">
            <h3 class="display-4">Billet simple pour l'Alaska</h3>
            <p class="lead">Bienvenue sur le site de mon nouveau livre en cours d'ecriture.</br>
            Vous pourrez consultez les extrait de ce livre et bien sur me laisser des commentaires pour me dire ce que vous en pensez.</p>
          </div>

      </div>
    </div>


    <div class="container">
      <div class="row">
        <?php foreach ($results as $result):?>
        <div class="col-lg-6 col-sm-6">
          <div class="chapter-custom jumbo-custom jc">
            <h1 ><?=htmlspecialchars($result['title'])?></h1>
            <p ><?= substr($result['content'],0,110)?>...</p>
            <hr >
            <p >
              <a href="index.php?action=viewChapter&amp;id=<?=$result['id']?>">Lire la suite</a>
            </p>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>

<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
