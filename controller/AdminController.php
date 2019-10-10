<?php
namespace forteroche\controller;

require_once('model/CommentManager.php');
require_once('controller/ConnectionControlleur.php');


class AdminController extends Connect
{

  public function adminPage(){
    $isAdmin = $this->isAdmin();
    $comment= new \forteroche\model\CommentManager();
    $results = $comment->getReportComment();
    require('view/backend/comment.php');
  }


}
