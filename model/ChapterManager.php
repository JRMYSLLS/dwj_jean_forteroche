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
    $req = $db->prepare('SELECT id,title,content,DATE_FORMAT(creation_date, \'%Y/%m/%d\') AS creation_date_fr
                         FROM chapter
                         ORDER BY creation_date_fr DESC');
    $req->execute(array());
    $results = $req->fetchAll();
    return $results;
  }

  function getChapter($id)
  {
    $db = $this->dbconnect();
    $req = $db->prepare('SELECT id,title,content,DATE_FORMAT(creation_date, \'%Y/%m/%d\') AS creation_date_fr
                         FROM chapter
                         WHERE id=?');
    $req->execute(array($id));
    $results = $req->fetch();
    return $results;
  }

  function newChapter($title,$chapter)
  {
  $db = $this->dbconnect();
  $req = $db->prepare('INSERT INTO chapter(title,content,creation_date) VALUES(?,?,NOW())');
  $affectedline = $req->execute(array($title,$chapter));

  return $affectedline;
  }

  function deleteChapter($id)
  {
    $db = $this->dbconnect();
    $req = $db->prepare('DELETE FROM chapter WHERE id=?');
    $affectedline = $req->execute(array($id));

    return $affectedline;
  }

  function editChapter($id,$content,$title)
  {
    $db = $this->dbconnect();
    $req = $db->prepare('UPDATE chapter
                         SET content=?, title=?
                         WHERE id=?');
   $result = $req->execute(array($content,$title,$id));

   return $result;
  }
}
