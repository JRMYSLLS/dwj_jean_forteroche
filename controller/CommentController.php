<?php

namespace forteroche\controller;
use \forteroche\model\CommentManager;
require_once('model/CommentManager.php');
require_once('controller/ConnectionControlleur.php');
require_once('controller/MessageFlash.php');

/**
 *
 */
class CommentController extends Connect
{
  public function postComment(){
    $chapter = new CommentManager();
    $flash = new \forteroche\controller\MessageFlash();
    if(isset($_POST['commentPost'])){
      $id_chapter = htmlspecialchars($_GET['id']);
      $author = $_SESSION['pseudo'];
      $comment = htmlspecialchars($_POST['comment']);
      if (!empty($comment)) {
        $chapter->postComment($id_chapter,$author,$comment);
        header('Location: index.php?action=viewChapter&id='.$id_chapter);
      }
      else {
        $flash->setFlash('votre commentaire est vide');
        header('Location: index.php?action=viewChapter&id='.$_GET['id']);
      }
    }
  }

  public function showComments(){
    $chapter = new CommentManager();

    if (isset($_GET['id']) && $_GET['id']>0) {
      $comments = $chapter->getComment($_GET['id']);
    }
  }

  public function allCommentView(){
    $isAdmin = $this->isAdmin();
    $chapter = new \forteroche\model\ChapterManager();
    $comment = new CommentManager();

    if (isset($_GET['id']) && $_GET['id']>0) {
      $num = $_GET['id'];
      $results = $chapter->getChapter($num);
      $comments = $comment->getComment($num);
    }
    require('view/backend/allCommentView.php');
  }

  public function reportComment(){
    $report = new CommentManager();
    if (isset($_GET['id']) && $_GET['id']>0 && isset($_GET['chapter'])) {
      $valideReport = $report->reportComment($_GET['id']);
      header('Location: index.php?action=viewChapter&id='.$_GET['chapter']);
    }
  }

  public function deleteComment(){
    $delete = new CommentManager();
    $flash = new \forteroche\controller\MessageFlash();
    if(isset($_GET['id'])){
      $delete->deleteComment($_GET['id']);
      if (isset($_GET['return'])) {
        $flash->setFlash('Commentaire supprimé','success');
        header('Location: index.php?action=allCommentView&id='.$_GET['chapter']);
      }else{
        header('Location: index.php?action=admin');
      }
    }
  }

  public function validateComment(){
    $validate = new CommentManager();
    if(isset($_GET['id'])){
      $validate->validateComment($_GET['id']);
      if (isset($_GET['return'])) {
        header('Location: index.php?action=allCommentView&id='.$_GET['chapter']);
      }else{
        header('Location: index.php?action=admin');
      }
    }
  }
}
