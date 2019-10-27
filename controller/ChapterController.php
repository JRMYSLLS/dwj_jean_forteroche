<?php

namespace forteroche\controller;
use \forteroche\model\CommentManager;
use \forteroche\model\ChapterManager;

require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('controller/Controller.php');

class ChapterController extends Controller
{

  public function listChapter(){
    $chapter = new ChapterManager();
    $results = $chapter->getChapters();
    require('view/accueil.php');
  }

  public function showChapter(){
  $chapter = new ChapterManager();
  $comment = new CommentManager();

  if (isset($_GET['id']) && $_GET['id']>0) {
    $num = $_GET['id'];
    $results = $chapter->getChapter($num);
    $comments = $comment->getComment($num);

    if ($results['id']==$num) {
      require('view/ChapterView.php');
    }
    else{
      $this->setFlash('Ce chapitre n\'existe pas!');
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
    $chapter = new ChapterManager();
    $results = $chapter->getChaptersAndComments();
    require('view/backend/editListChapter.php');
  }

  public function editChapterView(){
    $isAdmin = $this->isAdmin();
    $chapter = new ChapterManager();

    if(isset($_GET['id']) && $_GET['id']>0){
      $results = $chapter->getChapter($_GET['id']);
      require('view/backend/editChapterView.php');
    }
  }

  public function editChapter(){
    $chapter = new ChapterManager();

    if(isset($_GET['id']) && $_GET['id']>0){
      $id = $_GET['id'];
      $content = html_entity_decode(htmlspecialchars($_POST['content']));
      $title = htmlspecialchars($_POST['title']);

        if (!empty($content) && !empty($title)) {
          $result = $chapter->editChapter($id,$content,$title);
          $this->setFlash('Chapitre modifié','success');
          header('location: index.php?action=editListChapter');
        }

      else {
        $this->setFlash('Tout les champs sont obligatoire !');
        header('location: index.php?action=editChapterView&id='.$id);
    }

  }

}


  public function deleteChapter(){
    $chapter = new ChapterManager();
    $comment = new CommentManager();

    if(isset($_GET['id']) && $_GET['id']>0){
      $id = $_GET['id'];
      $chapter->deleteChapter($id);
      $comment->deleteCommentInChapter($id);
      $this->setFlash('Chapitre supprimé','success');
      header('location: index.php?action=editListChapter');
    }

  }

  public function newChapter(){
    $isAdmin = $this->isAdmin();
    $chapter = new ChapterManager();

    if (isset($_POST['newChapter'])) {
      $title = htmlspecialchars($_POST['title']);
      $content = $_POST['content'];

      if(!empty($title) OR !empty($content)){
        $chapter->newChapter($title,$content);
        $this->setFlash('Nouveau chapitre publié','success');
        header('location: index.php?action=editListChapter');
      }

      else {
        $this->setFlash('Tout les champs sont obligatoire !');
        header('location: index.php?action=newChapter');
      }
    }
  }
}
