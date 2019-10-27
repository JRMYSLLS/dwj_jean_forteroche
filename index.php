<?php
ini_set('display_errors',1);
session_start();


require_once('controller/ChapterController.php');
require_once('controller/MemberController.php');
require_once('controller/CommentController.php');

$action='';
$membre = new \forteroche\controller\MembersController();
$chapter = new \forteroche\controller\ChapterController();
$comment = new \forteroche\controller\CommentController();



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
      $comment->adminPage();
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

    case 'editChapterView':
      $chapter->editChapterView();
      break;

    case 'editChapter':
      $chapter->editChapter();
      break;

    case 'deleteChapter':
      $chapter->deleteChapter();
      break;

    case 'allCommentView':
      $comment->allCommentView();
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

// status si flag dans la BDD

//message flash pour les erreurs corriger Modifier un article modifier liste commentaires trim htmlspecialchars
