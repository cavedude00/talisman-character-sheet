<?php

switch ($action) {
  case 0:
	if(!$gameid){
		$body = new Template("templates/character/character.nogame.tmpl.php");
	}
	else{
		$charid = get_char($gameid);
		if($charid == 0)
		{
			$body = new Template("templates/character/character.select.tmpl.php");
			$body->set("charselect", random_char_select($gameid));
			$body->set("gameid", $gameid);
		}
		else {
			$body = new Template("templates/objectives/objectives.default.tmpl.php");
			$body->set("charid", $charid);
			$body->set("gameid", $gameid);
			$body->set("games", get_game_variables());
			$body->set("rquote", rand(1,5));
       	}
	}
  break;
  case 1:
     reveal_ending();
     header("Location: index.php?editor=objectives&gameid=$gameid&charid=$charid");
     exit;	
}

function get_game_variables(){
  global $mysql, $gameid;

  $query = "SELECT ending,reaper,revealed FROM games where id = $gameid";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function reveal_ending(){
  global $mysql, $gameid;

  $query = "UPDATE games set revealed = 1 where id = $gameid";
  $mysql->query_no_result($query);

}

?>