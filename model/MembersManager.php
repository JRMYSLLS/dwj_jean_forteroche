<?php
 namespace forteroche\model;
require_once('model/Manager.php');

/**
 *
 */

class MembersManager extends Manager
{

  public function registration($pseudo,$mail,$password){
    $db = $this->dbconnect();
    $req = $db->prepare('INSERT INTO members(pseudo,mail,password) VALUES(?,?,?)');
    $affectedline = $req->execute(array($pseudo,$mail,$password));

    return $affectedline;
  }

  public function isRegistred($mail){
    $db = $this->dbconnect();
    $req = $db->prepare('SELECT mail FROM members WHERE mail=?');
    $req->execute(array($mail));
    $result = $req->rowCount();

    return $result;
  }

  public function isAlreadyUsed($pseudo){
    $db = $this->dbconnect();
    $req = $db->prepare('SELECT pseudo FROM members WHERE pseudo=?');
    $req->execute(array($pseudo));
    $result = $req->rowCount();

    return $result;
  }

  public function connection($mail){
    $db = $this->dbconnect();
    $req = $db->prepare('SELECT * FROM members WHERE mail=?');
    $req->execute(array($mail));
    $result = $req->fetch();

    return $result;
  }
}
