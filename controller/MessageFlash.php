<?php
namespace forteroche\controller;

class MessageFlash
{

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

/*elseif ( isset($_SESSION['successMsg']) ) {
  echo '<div class="alert alert-success" role="alert"><strong>'. $_SESSION['successMsg'] . '</strong></div>';
  unset($_SESSION['successMsg']);
}*/
