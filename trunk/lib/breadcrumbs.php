<?php

switch ($editor) {
  case '':
    break;
  case 'main':
    $breadcrumbs = "<a href='index.php?editor=" . $editor . "'>$playername ($wins-$losses-$ties)</a>";
    break;
 case 'character':
    $breadcrumbs = "<a href='index.php?editor=" . $editor . "'>$playername ($wins-$losses-$ties)</a>";
    break;
 case 'opponents':
    $breadcrumbs = "<a href='index.php?editor=" . $editor . "'>Please, you see:</a>";
    break;
} 

?>
