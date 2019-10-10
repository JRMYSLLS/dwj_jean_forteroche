<?php $title = 'admin'; ?>

<?php ob_start(); ?>
<div class="container-fluid">
  <div class="row">
    <?php include'admin.php'; ?>
    <div class="col-md-8">
      <form name="newChapter" id="formulaire" action="index.php?action=publishChapter" method="post">
        <label for="title">titre</label>
        <input id ="title" type="text" name="title" value="<?=$results['title']?>">
        <textarea id="texte" name="content" ><?=$results['content']?></textarea>
        <input type="submit" name="newChapter" value="publier">
      </form>
    </div>
  </div>
</div>
<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
