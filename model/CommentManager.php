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
     $req = $db->prepare('SELECT id,id_chapter,author,comment,status_comment
                          FROM comments
                          WHERE id_chapter=?');
     $req->execute(array($id_chapter));
     $comments = $req->fetchAll();

     return $comments;
   }

   public function reportComment($validate){
     $db = $this->dbconnect();
     $req = $db->prepare('UPDATE comments
                          SET status_comment = 1
                          WHERE id=?');
    $result = $req->execute(array($validate));

      return $result;
   }

   public Function getReportComment(){
     $db = $this->dbconnect();
     $req = $db->prepare('SELECT id,id_chapter,author,comment,status_comment
                          FROM comments
                          WHERE status_comment= 1 ');
    $req->execute(array());
    $comments = $req->fetchAll();

    return $comments;
   }

   public function deleteComment($id){
     $db = $this->dbconnect();
     $req = $db->prepare('DELETE FROM comments where id=?');
     $result = $req->execute(array($id));

     return $result;
   }

   public function deleteCommentInChapter($id){
     $db = $this->dbconnect();
     $req = $db->prepare('DELETE FROM comments where id_chapter=?');
     $result = $req->execute(array($id));

     return $result;
   }

   public function validateComment($validate){
     $db = $this->dbconnect();
     $req = $db->prepare('UPDATE comments
                          SET status_comment = 2
                          WHERE id=?');
    $result = $req->execute(array($validate));

    return $result;
   }

 }
