<?php

namespace forteroche\controller;
use \forteroche\model\MembersManager;
require_once('model/membersManager.php');

/**
 *
 */
class MembersController
{

  public function addMember(){
    $newMember = new MembersManager();
    if (isset($_POST['inscription'])) {
      if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          $verif = $newMember->isRegistred($mail);
          if ($verif == 0) {
            $result = $newMember->registration($pseudo,$mail,$password);
          }
          else {
            throw new \Exception('adresse mail deja utilisé!!!');
          }
        }
        else {
          throw new \Exception('adresse mail non valide!!!');
        }
      }
      else {
        throw new \Exception('tout les champs doivent etre remplie!!!');
      }
    }
  }
  public function connect(){
    $connectUser = new MembersManager();
    if (isset($_POST['connection'])) {

      if (!empty($_POST['mail']) &&!empty($_POST['password'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $password = $_POST['password'];
        $verify = $connectUser->connection($mail);
        $passwordMatch = password_verify($password, $verify['password']);
        if($passwordMatch){
          $_SESSION['pseudo'] = $verify['pseudo'];
          $_SESSION['id'] = $verify['id'];
          header('Location: index.php');
        }
        else{
          throw new \Exception('mauvais mail ou mot de passe!!!');
        }
      }
      else {
        throw new \Exception('tous les champs doivent etre remplient!!!');
      }
    }
  }

  public function disconnection(){
    $_SESSION = array();
    session_destroy();

// Suppression des cookies de connexion automatique
    setcookie('id', '');
    setcookie('pseudo', '');
    header('Location: index.php');
  }


}

/*
___________ AVANT PASSAGE EN OBJET______________!!!



function addMember(){
  $newMember = new Members();
  if (isset($_POST['inscription'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $verif = $newMember->isRegistred($mail);
        if ($verif == 0) {
          $result = $newMember->registration($pseudo,$mail,$password);
        }
        else {
          throw new \Exception('adresse mail deja utilisé!!!');
        }
      }
      else {
        throw new \Exception('adresse mail non valide!!!');
      }
    }
    else {
      throw new \Exception('tout les champs doivent etre remplie!!!');
    }
  }

}

function connect(){
  $connectUser = new Members();
  if (isset($_POST['connection'])) {
    if (!empty($_POST['mail']) &&!empty($_POST['password'])) {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
  }
}

trim pour virer les espaces
*/
