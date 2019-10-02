<?php

namespace forteroche\controller;
use \forteroche\model\CommentManager;
require_once('model/CommentManager.php');

/**
 *
 */
class CommentController
{
  public function postComment(){
    $chapter = new CommentManager();
    if(isset($_POST['commentPost'])){
      $id_chapter = htmlspecialchars($_GET['id']);
      $author = $_SESSION['pseudo'];
      $comment = htmlspecialchars($_POST['comment']);
      if (!empty($comment)) {
        $chapter->postComment($id_chapter,$author,$comment);
        header('Location: index.php?action=viewChapter&id='.$id_chapter);
      }
      else {
        throw new \Exception("votre commentaire est vide");

      }
    }
  }

  public function showComments(){
    $chapter = new CommentManager();

    if (isset($_GET['id']) && $_GET['id']>0) {
      $comments = $chapter->getComment($_GET['id']);
    }
  //  require('view/ChapterView.php');
  }

  public function reportComment(){
    $report = new CommentManager();
    if (isset($_GET['id']) && $_GET['id']>0 && isset($_GET['chapter'])) {
      //$chapter = $_GET['chapter'];
      $valideReport = $report->reportComment($_GET['id']);
      header('Location: index.php?action=viewChapter&id='.$_GET['chapter']);
    }else{
      echo 'prout';
    }

  }

  public function deleteComment(){
    $delete = new CommentManager();
    if(isset($_GET['id'])){
      $delete->deleteComment($_GET['id']);
      header('Location: index.php?action=admin');
    }
  }

  public function validateComment(){
    $validate = new CommentManager();
    if(isset($_GET['id'])){
      $validate->validateComment($_GET['id']);
      header('Location: index.php?action=admin');
    }
  }
}
