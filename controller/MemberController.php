<?php

namespace forteroche\controller;
use \forteroche\model\MembersManager;
require_once('./model/MembersManager.php');
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
              $flash->setFlash('Votre compte vient d\'étre créé','success');
              header('location: index.php?action=login');
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
        $flash->setFlash('Tout les champs sont obligatoires !');
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
          $flash->setFlash('Vous etes connecté','success');
          header('location: index.php');
          if($verify['is_admin']==0){
            $_SESSION['admin'] = true;
            $flash->setFlash('Bonjour Mr Forteroche','success');
            header('Location: index.php?action=admin');
          }
          else{
            $_SESSION['admin'] = false;
            header('Location: index.php');
          }
        }
        else{
          $flash->setFlash('Mauvais mail ou mot de passe!!!');
          header('location: index.php?action=login');
        }
      }
      else {
        $flash->setFlash('Tout les champs sont obligatoires !');
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
