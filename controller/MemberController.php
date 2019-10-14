<?php

namespace forteroche\controller;
use \forteroche\model\MembersManager;
require_once('model/membersManager.php');
require_once('controller/MessageFlash.php');

/**
 *
 */
class MembersController
{

  public function connectionView(){
    require('view/ConectionView.php');
  }

  public function addMember(){
    $newMember = new MembersManager();
    $flash = new \forteroche\controller\MessageFlash();
    if (isset($_POST['inscription'])) {
      $tPseudo = trim($_POST['pseudo']);
      $tMail = trim($_POST['mail']);
      $tPassword = trim($_POST['password']);
      $pseudo = htmlspecialchars($tPseudo);
      $mail = htmlspecialchars($tMail);
      $password = password_hash($tPassword, PASSWORD_DEFAULT);
      if (!empty($tPseudo) && !empty($tMail) && !empty($tPassword)) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          $verif = $newMember->isRegistred($mail);
          if ($verif == 0) {
            $verifPseudo = $newMember->isAlreadyUsed($pseudo);
            if($verifPseudo == 0){
              $result = $newMember->registration($pseudo,$mail,$password);
              header('location: index.php');
            }
            else{
              $flash->setFlash('Ce pseudo est déjà utilisé!');
              header('location: index.php?action=login');
            }

          }
          else {
            $flash->setFlash('Ce mail est déjà utilisé!');
            header('location: index.php?action=login');
          }
        }
        else {
          $flash->setFlash('adresse mail non valide!!!');
          header('location: index.php?action=login');
        }
      }
      else {
        $flash->setFlash('Veuillez remplir tout les champs');
        header('location: index.php?action=login');
      }
    }
  }

  public function connect(){
    $connectUser = new MembersManager();
    $flash = new \forteroche\controller\MessageFlash();
    if (isset($_POST['connection'])) {

      if (!empty($_POST['mail']) &&!empty($_POST['password'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $password = $_POST['password'];
        $verify = $connectUser->connection($mail);
        $passwordMatch = password_verify($password, $verify['password']);
        if($passwordMatch){
          $_SESSION['pseudo'] = $verify['pseudo'];
          $_SESSION['id'] = $verify['id'];
          if($verify['is_admin']==0){
            $_SESSION['admin'] = true;
            $flash->setFlash('Bienvenue Mr FORTEROCHE');
            header('Location: index.php?action=admin');
          }
          else{
            $_SESSION['admin'] = false;
            header('Location: index.php');
          }
        }
        else{
          $flash->setFlash('mauvais mail ou mot de passe!!!');
          header('location: index.php?action=login');
        }
      }
      else {
        $flash->setFlash('tous les champs doivent etre remplient!!!');
        header('location: index.php?action=login');

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
// pas de session avec is_admin
