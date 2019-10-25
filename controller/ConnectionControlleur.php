<?php
namespace forteroche\controller;
require_once('controller/MessageFlash.php');

class Connect
{


  function isConnect(){
    if (isset($_SESSION['pseudo'])) {

    }else{
      throw new \Exception("Vous devez étre connecté pour avoir accès à cette page");
    }
  }

  function isAdmin(){
    if(isset($_SESSION['admin'])&&$_SESSION['admin']){

  }else{
    throw new \Exception("Cette page est reserver à Mr Forteroche :)");
    }
  }
}
