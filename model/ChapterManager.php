<?php
namespace forteroche\model;
require_once('model/Manager.php');
/**
 *
 */
class ChapterManager extends Manager
{

  function getChapters()
  {
    $db = $this->dbconnect();
    $req = $db->prepare('SELECT id,title,content,DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr
                         FROM chapter
                         ORDER BY creation_date_fr');
    $req->execute(array());
    $results = $req->fetchAll();
    return $results;
  }

  function getChapter($id)
  {
    $db = $this->dbconnect();
    $req = $db->prepare('SELECT title,content,DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr
                         FROM chapter
                         WHERE id=?');
    $req->execute(array($id));
    $results = $req->fetch();
    return $results;
  }
}
