<?php

require_once('model/membersManager.php');

function registration(){
  require('view/ConectionView.php');
}

function addMember(){
  $newMember = new \forteroche\model\Members();
  if (isset($_POST['inscription'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
      $functionMember = 1;
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $result = $newMember->registration($functionMember,$pseudo,$mail,$password);
    }
    else {
      throw new \Exception('tout les champs doivent etre remplie!!!');
    }
  }

}
