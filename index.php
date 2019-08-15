<?php

require_once('controller/ChapterController.php');
require_once('controller/memberControler.php');

$action='';

if(isset($_GET['action'])){
  $action = $_GET['action'];
};

try {
  switch ($action) {
    case 'chapter':
      listChapter();
      break;

    case 'viewChapter':
      showChapter();
      break;

    case 'login':
      registration();
      break;

    case 'registration':
      addMember();

    default:
      listChapter();
      break;
  }
} catch (\Exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}
