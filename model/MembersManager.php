<?php
 namespace forteroche\model;
require_once('model/Manager.php');

/**
 *
 */

class Members extends Manager
{

  public function registration($functionMember,$pseudo,$mail,$password){
    $db = $this->dbconnect();
    $req = $db->prepare('INSERT INTO members(id_function,pseudo,mail,password) VALUES(?,?,?,?)');
    $affectedline = $req->execute(array($functionMember,$pseudo,$mail,$password));

    return $affectedline;
  }

}
