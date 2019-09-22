<?php
 namespace forteroche\model;
 require_once('model/Manager.php');

 /**
  *
  */
 class CommentManager extends Manager
 {

   public function postComment($id,$author,$comment){
     $db = $this->dbconnect();
     $req = $db->prepare('INSERT INTO comments(id_chapter,author,comment,comment_date) VALUES(?,?,?,NOW())');
     $result = $req->execute(array($id,$author,$comment));

     return $result;
   }

   public function getComment($id_chapter){
     $db = $this->dbconnect();
     $req = $db->prepare('SELECT id,id_chapter,author,comment,validate_comment
                          FROM comments
                          WHERE id_chapter=?');
     $req->execute(array($id_chapter));
     $comments = $req->fetchAll();

     return $comments;
   }
/*
   public function deleteComment($id){

   }
   */
 }
