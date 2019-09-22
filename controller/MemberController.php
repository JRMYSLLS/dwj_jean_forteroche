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
      $tPseudo = trim($_POST['pseudo']);
      $tMail = trim($_POST['mail']);
      $tPassword = trim($_POST['password']);
      if (!empty($tPseudo) && !empty($tMail) && !empty($tPassword)) {
        $pseudo = htmlspecialchars($tPseudo);
        $mail = htmlspecialchars($tMail);
        $password = password_hash($tMail, PASSWORD_DEFAULT);
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

    setcookie('id', '');
    setcookie('pseudo', '');
    header('Location: index.php');
  }


}

//trim pour virer les espaces
