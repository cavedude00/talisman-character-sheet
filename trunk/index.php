<?php

$current_revision = "r1";

require_once("config.php");
require_once("lib/logging.php");
require_once("classes/mysql.php");
require_once("classes/template.php");
require_once("classes/session.php");
require_once("lib/common.php");
require_once("lib/data.php");

$editor = (isset($_GET['editor']) ? $_GET['editor'] : '');
$action = (isset($_GET['action']) ? $_GET['action'] : 0);
$playerid = $_SESSION['playerid'];
$playername = $_SESSION['login'];
$wins = $_SESSION['wins'];
$losses = $_SESSION['losses'];
$ties = $_SESSION['ties'];
$gameid = (isset($_GET['gameid']) ? $_GET['gameid'] : '');
$charid = (isset($_GET['charid']) ? $_GET['charid'] : '');

$body = '';
$javascript = '';
$breadcrumbs = '';
$headbar = '';

require_once('lib/headbars.php');
require_once('lib/breadcrumbs.php');

if (isset($_GET['admin'])) {
  if (session::is_admin()) {
    require_once('lib/admin.php');
  }
}

switch ($editor) {
  case '':
    $body = new Template("templates/intro.tmpl.php");
    $body->set('current_revision', $current_revision);
    break;
    case 'main':
    require_once('lib/main.php');
    break;
    case 'character':
    require_once('lib/character.php');
    break;
    case 'opponents':
    require_once('lib/opponents.php');
    break;
}

$tmpl->set('javascript', $javascript);
$tmpl->set('headbar', $headbar);
$tmpl->set('breadcrumbs', $breadcrumbs);
$tmpl->set('body', $body);

echo $tmpl->fetch('templates/index.tmpl.php');

?>
