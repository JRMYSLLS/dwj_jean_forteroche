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
      //  require('view/ChapterView.php');
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
}
