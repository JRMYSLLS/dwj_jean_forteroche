<?php

namespace forteroche\controller;
use \forteroche\model\MembersManager;
require_once('./model/MembersManager.php');
require_once('controller/Controller.php');

/**
 *
 */
class MembersController extends Controller
{

  public function connectionView(){
    require('view/ConectionView.php');
  }

  public function addMember(){
    $newMember = new MembersManager();

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
              $this->setFlash('Votre compte vient d\'étre créé','success');
              header('location: index.php?action=login');
            }
            else{
              $this->setFlash('Ce pseudo est déjà utilisé!');
              header('location: index.php?action=login');
            }

          }
          else {
            $this->setFlash('Ce mail est déjà utilisé!');
            header('location: index.php?action=login');
          }
        }
        else {
          $this->setFlash('adresse mail non valide!!!');
          header('location: index.php?action=login');
        }
      }
      else {
        $this->setFlash('Tout les champs sont obligatoires !');
        header('location: index.php?action=login');
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
          $this->setFlash('Vous etes connecté','success');
          header('location: index.php');

          if($verify['is_admin']==0){
            $_SESSION['admin'] = true;
            $this->setFlash('Bonjour Mr Forteroche','success');
            header('Location: index.php?action=admin');
          }

          else{
            $_SESSION['admin'] = false;
            header('Location: index.php');
          }
        }

        else{
          $this->setFlash('Mauvais mail ou mot de passe!!!');
          header('location: index.php?action=login');
        }
      }

      else {
        $this->setFlash('Tout les champs sont obligatoires !');
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

// faire un $url et un header(location: $url)

//trim pour virer les espaces
// pas de session avec is_admin
