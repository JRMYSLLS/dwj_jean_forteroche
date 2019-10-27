<?php
namespace forteroche\controller;

class Controller
{


  public function isConnect(){
    if (!isset($_SESSION['pseudo'])) {
      throw new \Exception("Vous devez étre connecté pour avoir accès à cette page");
    }
  }

  public function isAdmin(){
    if(!isset($_SESSION['admin'])){
      throw new \Exception("Cette page est reservé à Mr Forteroche :)");
    }
  }

  public static function setFlash($message, $type ='danger') {
      $_SESSION['flash'] = array(
        'message' => $message,
        'type'    =>$type
      );
  }

  public static function getFlash() {
    if (isset($_SESSION['flash']) ) {
      echo '<div id="alert" class="alert alert-'. $_SESSION['flash']['type'] .'">
            <a class="close"> x </a>
            <p class="txt">'
            . $_SESSION['flash']['message'] .
            '</p>
            </div>';
      unset($_SESSION['flash']);
    }

  }
}
