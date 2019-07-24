<?php $title='Accueil' ?>

<?php ob_start(); ?>

<?php foreach ($results as $result):?>

  <table>
    <tr>
      <th><?=htmlspecialchars($result['title'])?></th>
    </tr>
    <tr>
      <td><?= substr($result['content'],0,40)?>...</td>
      <td> <a href="index.php?action=viewChapter&amp;id=<?=$result['id']?>">Consultez le chapitre</a> </td>
    </tr>
  </table>

<?php endforeach;?>
<?php $content =ob_get_clean(); ?>
<?php require('view/template.php') ?>
