<?php

require_once('controller/ChapterController.php');
require_once('controller/memberControler.php');

$action='';
$membre = new \forteroche\controller\Members();
$chapter = new \forteroche\controller\ChapterController();

if(isset($_GET['action'])){
  $action = $_GET['action'];
};

try {
  switch ($action) {
    case 'chapter':
      $chapter->listChapter();
      break;

    case 'viewChapter':
      $chapter->showChapter();
      break;

    case 'login':
      require('view/ConectionView.php');
      break;

    case 'registration':
      $membre->addMember();
      break;
    default:
      $chapter->listChapter();
      break;
  }
} catch (\Exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}
