<?php
/**
 *
 */
namespace forteroche\model;
class Manager
{

  protected function dbconnect()
  {
    try
      {
        $db = new \PDO('mysql:host=localhost;dbname=JeanForteroche;charset=utf8', 'root', 'root');
        return $db;
      }
        catch(Exception $e)
      {
        die('Erreur : '.$e->getMessage());
      }
  }
}
