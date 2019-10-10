<?php

namespace forteroche\controller;


require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('controller/ConnectionControlleur.php');

class ChapterController extends Connect
{

  public function listChapter(){
    $chapter = new \forteroche\model\ChapterManager();
    $results = $chapter->getChapters();
    require('view/accueil.php');
  }

  public function showChapter(){
  $chapter = new \forteroche\model\ChapterManager();
  $comment = new \forteroche\model\CommentManager();

  if (isset($_GET['id']) && $_GET['id']>0) {
    $num = $_GET['id'];
    $results = $chapter->getChapter($num);
    $comments = $comment->getComment($num);
  }
  require('view/ChapterView.php');
  }

  public function newChapterView(){
    $isAdmin = $this->isAdmin();
    require('view/backend/newChapterView.php');
  }

  public function editListChapter(){
    $isAdmin = $this->isAdmin();
    $chapter = new \forteroche\model\ChapterManager();
    $results = $chapter->getChapters();
    require('view/backend/editListChapter.php');
  }

  public function editChapterView(){
    $isAdmin = $this->isAdmin();
    $chapter = new \forteroche\model\ChapterManager();
    if(isset($_GET['id']) && $_GET['id']>0){
      $results = $chapter->getChapter($_GET['id']);
      require('view/backend/editChapterView.php');
    }
  }

  public function editChapter(){
    $chapter = new \forteroche\model\ChapterManager();
    if(isset($_GET['id']) && $_GET['id']>0){
      $id = $_GET['id'];
      $content = html_entity_decode(htmlspecialchars($_POST['content']));
      $title = htmlspecialchars($_POST['title']);
      $result = $chapter->editChapter($id,$content,$title);
    }
  }

  public function deleteChapter(){
    $chapter = new \forteroche\model\ChapterManager();
    $comment = new \forteroche\model\CommentManager();
    if(isset($_GET['id']) && $_GET['id']>0){
      $id = $_GET['id'];
      $chapter->deleteChapter($id);
      $comment->deleteComment($id);
    }

  }

  public function newChapter(){
    $isAdmin = $this->isAdmin();
    $chapter = new \forteroche\model\ChapterManager();
    if (isset($_POST['newChapter'])) {
      $title = htmlspecialchars($_POST['title']);
      $content = html_entity_decode(htmlspecialchars($_POST['content']));
      if(!empty($title) OR !empty($content)){
        $chapter->newChapter($title,$content);
        header('location: index.php');
        echo 'prout';
      }else {
        throw new \Exception("Verifiez d'avoir écrit un chapitre et qu'il posséde un titre");

      }
    }
  }
}
