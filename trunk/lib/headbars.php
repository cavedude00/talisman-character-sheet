<?php

// Build editor tabs
$headbar = build_tabs();

switch ($editor) {
  case '':
    break;
  case 'main':
    	break;
  case 'character':
    	break;
  case 'opponents':
    	break;
  case 'objectives':
    	break;
 }

function build_tabs () {
  global $editor, $gameid, $charid;

  $tabstatus1 = "off";
  $tabstatus2 = "off";
  $tabstatus3 = "off";
  $tabstatus4 = "off";

  $gameurl = "";
  $charurl = "";
  if ($gameid) $gameurl = "&gameid=$gameid";
  if ($charid) $charurl = "&charid=$charid";

  switch ($editor) {
    case '':
      break;
    case 'main':
      $tabstatus1 = "on";
      break;
    case 'character':
      $tabstatus2 = "on";
      break;
    case 'opponents':
      $tabstatus3 = "on";
      break;
    case 'objectives':
      $tabstatus4 = "on";
      break;
  }

  $admin = '';
  if (session::is_admin()) {
    $admin = "<a href=\"index.php?admin\">Admin</a> | ";
  }

  ob_start();

  echo "      <div id=\"menubar\">
	<center>
       <div class=\"$tabstatus1\"><a href=\"index.php?editor=main$gameurl$charurl\">Games</a></div></center>
	<div class=\"$tabstatus2\"><a href=\"index.php?editor=character$gameurl$charurl\">Character</a></div>
	<div class=\"$tabstatus3\"><a href=\"index.php?editor=opponents$gameurl$charurl\">Opponents</a></div>
	<div class=\"$tabstatus4\"><a href=\"index.php?editor=objectives$gameurl$charurl\">Objectives</a></div>
	<div style=\"float: right;\">$admin<a href=\"index.php?logout\">Logout</a></div><br>
      </div>
";

  $headbar = ob_get_contents();
  ob_end_clean();

  return $headbar;
  
}
?>