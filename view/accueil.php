<?php $title='Accueil' ?>

<?php ob_start(); ?>
  <div>
    <header class="masthead masthead_custom" style="background-image: url('./public/images/region-alaska.jpg')">
     <div class="overlay"></div>
     <div class="container">
       <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
           <div class="site-heading">
             <h1>Billet simple pour l'Alaska</h1>
             <span class="subheading">Bienvenue sur le site de mon nouveau livre en cours d'écriture.<br>
             Vous pourrez consulter les extraits de ce livre et bien sur me laisser des commentaires pour me dire ce que vous en pensez.</span>
           </div>
         </div>
       </div>
     </div>
   </header>

    <div class="container">
      <div class="row">
        <?php foreach ($results as $result):?>
        <div class="col-lg-6 col-sm-6">
          <div class="chapter-custom jumbo-custom jc">
            <h1 ><?=$result['title']?></h1>
            <p ><?= substr($result['content'],0,110)?>...</p>
            <hr >
            <p >
              <a href="index.php?action=viewChapter&amp;id=<?=$result['id']?>" class="lire">Lire la suite</a>
            </p>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>



<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
