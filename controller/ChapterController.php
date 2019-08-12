<?php
require_once('model/ChapterManager.php');

function listChapter(){
  $chapter = new \forteroche\model\ChapterManager();
  $results = $chapter->getChapters();
  require('view/accueil.php');
}

function showChapter(){
$chapter = new \forteroche\model\ChapterManager();

if (isset($_GET['id']) && $_GET['id']>0) {
  $results = $chapter->getChapter($_GET['id']);
}
require('view/ChapterView.php');

}
