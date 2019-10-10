<?php
session_start();


require_once('controller/ChapterController.php');
require_once('controller/MemberController.php');
require_once('controller/CommentController.php');
require_once('controller/AdminController.php');

$action='';
$membre = new \forteroche\controller\MembersController();
$chapter = new \forteroche\controller\ChapterController();
$comment = new \forteroche\controller\CommentController();
$admin = new \forteroche\controller\AdminController();

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
      $membre->connectionView();
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

    case 'comment':
      $comment->postComment();
      break;

    case 'admin':
      $admin->adminPage();
      break;

    case 'reportComment':
      $comment->reportComment();
        break;

    case 'deleteComment':
      $comment->deleteComment();
      break;

    case 'validateComment':
      $comment->validateComment();
      break;

    case 'newchapter':
      $chapter->newchapterView();
      break;

    case 'publishChapter':
      $chapter->newChapter();
      break;

    case 'editListChapter':
      $chapter->editListChapter();
      break;

    case 'editChapter':
      $chapter->editChapterView();
      break;

    case 'deleteChapter':
      $chapter->deleteChapter();

    default:
      $chapter->listChapter();
      break;
  }
} catch (\Exception $e) {
  require('view/erreur.php');
}
// mettre antislash pour class native PHP devant

//autoload??

// status si flag dans la BDD
