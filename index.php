<?php

require_once('controller/ChapterController.php');
require_once('controller/memberControler.php');

$action='';

if(isset($_GET['action'])){
  $action = $_GET['action'];
};

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

  default:
    listChapter();
    break;
}
