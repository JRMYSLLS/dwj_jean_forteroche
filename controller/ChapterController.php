<?php

namespace forteroche\controller;


require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');

class ChapterController{

  public function listChapter(){
    $chapter = new \forteroche\model\ChapterManager();
    $results = $chapter->getChapters();
    require('view/accueil.php');
  }

  public function showChapter(){
  $chapter = new \forteroche\model\ChapterManager();
  $comment = new \forteroche\model\CommentManager();
  $num = $_GET['id'];

  if (isset($_GET['id']) && $_GET['id']>0) {
    $results = $chapter->getChapter($num);
    $comments = $comment->getComment($num);
  }


  require('view/ChapterView.php');

  }
}





//message flash PHP
//controller parents
