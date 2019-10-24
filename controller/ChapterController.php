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
  $flash = new \forteroche\controller\MessageFlash();

  if (isset($_GET['id']) && $_GET['id']>0) {
    $num = $_GET['id'];
    $results = $chapter->getChapter($num);
    $comments = $comment->getComment($num);
    if ($results['id']==$num) {
      require('view/ChapterView.php');
    }else{
      $flash->setFlash('Ce chapitre n\'existe pas!');
      header('location: index.php');
    }
  }
  }

  public function newChapterView(){
    $isAdmin = $this->isAdmin();
    require('view/backend/newChapterView.php');
  }

  public function editListChapter(){
    $isAdmin = $this->isAdmin();
    $chapter = new \forteroche\model\ChapterManager();
    $results = $chapter->getChaptersAndComments();
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
    $flash = new \forteroche\controller\MessageFlash();
    if(isset($_GET['id']) && $_GET['id']>0){
      $id = $_GET['id'];
      $content = html_entity_decode(htmlspecialchars($_POST['content']));
      $title = htmlspecialchars($_POST['title']);
      if (!empty($content) && !empty($title)) {
        $result = $chapter->editChapter($id,$content,$title);
        $flash->setFlash('Chapitre modifié','success');
        header('location: index.php?action=editListChapter');
      } else {
        $flash->setFlash('Tout les champs sont obligatoire !');
        header('location: index.php?action=editChapterView&id='.$id);
    }
  }
}

  public function deleteChapter(){
    $chapter = new \forteroche\model\ChapterManager();
    $comment = new \forteroche\model\CommentManager();
    $flash = new \forteroche\controller\MessageFlash();
    if(isset($_GET['id']) && $_GET['id']>0){
      $id = $_GET['id'];
      $chapter->deleteChapter($id);
      $comment->deleteCommentInChapter($id);
      $flash->setFlash('Chapitre supprimé','success');
      header('location: index.php?action=editListChapter');
    }

  }

  public function newChapter(){
    $isAdmin = $this->isAdmin();
    $chapter = new \forteroche\model\ChapterManager();
    $flash = new \forteroche\controller\MessageFlash();
    if (isset($_POST['newChapter'])) {
      $title = htmlspecialchars($_POST['title']);
      $content = $_POST['content'];
      if(!empty($title) OR !empty($content)){
        $chapter->newChapter($title,$content);
        $flash->setFlash('Nouveau chapitre publié','success');
        header('location: index.php?action=editListChapter');
      }else {
        $flash->setFlash('Tout les champs sont obligatoire !');
        header('location: index.php?action=newChapter');
      }
    }
  }
}
