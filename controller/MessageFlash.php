<?php
namespace forteroche\controller;

class MessageFlash
{

  public static function setFlash($message) {
      $_SESSION['flash'] = $message;
  }

  public static function getFlash() {
    if (isset($_SESSION['flash']) ) {
      echo '<div id="alert" class="alert alert-danger">
            <a class="close"> x </a>
            <p class="txt">'
            . $_SESSION['flash'] .
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
