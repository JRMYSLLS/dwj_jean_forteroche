<?php

namespace forteroche\controller;
use \forteroche\model\ChapterManager;

require_once('model/ChapterManager.php');

class ChapterController{

  function listChapter(){
    $chapter = new ChapterManager();
    $results = $chapter->getChapters();
    require('view/accueil.php');
  }

  function showChapter(){
  $chapter = new ChapterManager();

  if (isset($_GET['id']) && $_GET['id']>0) {
    $results = $chapter->getChapter($_GET['id']);
  }
  require('view/ChapterView.php');

  }
}


//message flash PHP
//controller parents
