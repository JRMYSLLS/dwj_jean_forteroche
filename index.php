<?php
session_start();


require_once('controller/ChapterController.php');
require_once('controller/MemberController.php');

$action='';
$membre = new \forteroche\controller\MembersController();
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

    case 'connection':
      $membre->connect();
      break;

      case 'disconnection':
        $membre->disconnection();
        break;

    default:
      $chapter->listChapter();
      break;
  }
} catch (\Exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}
// mettre antislash pour class native PHP devant

//autoload??
