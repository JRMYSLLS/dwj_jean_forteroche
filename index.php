<?php

require_once('controller/ChapterController.php');

$action='';

if(isset($_GET['action'])){
  $action = $_GET['action'];
};

switch ($action) {
  case 'chapter':
    listChapter();
    break;

  case 'viewChapter':

    break;

  default:
    listChapter();
    break;
}
