<?php
require_once('model/ChapterManager.php');

function listChapter(){
  $chapter = new \forteroche\model\ChapterManager();
  $results = $chapter->getChapters();
  require('view/accueil.php');
}
