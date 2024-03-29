<?php
 
switch ($action) {
  case 0:
	if(!$gameid)
	{
      		$has_game = has_game();
      		$get_games = get_games();
      		$body = new Template("templates/main/main.default.tmpl.php");
		$body->set('hasgame', $has_game);
      		$body->set('gamecount', $get_games);
	}
	else
	{
		$body = new Template("templates/main/main.tmpl.php");
		$body->set('gameid', $gameid);
       	$body->set('charid', $charid);
	}
	break;
  case 1:
	$body = new Template("templates/main/game.start.tmpl.php");
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	$body->set('randomname', create_random_name());
	$body->set('endings', get_endings());
	break;
  case 2:
	$gameid = create_game();
	header("Location: index.php?editor=character&gameid=$gameid");
    	exit;	
  case 3:
	$body = new Template("templates/main/game.join.tmpl.php");
	$body->set("games", get_game_id());
	break;
  case 4: //Insert joined game
	$gameid = $_POST['gameid'];
	$charid = join_game($gameid);
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
	exit;
  case 5:
	$body = new Template("templates/main/game.delete.tmpl.php");
	$body->set("games", get_game_id());
	break;
  case 6:
	$dgameid = $_POST['dgameid'];
	delete_game($dgameid);
	header("Location: index.php?editor=main");
	exit;
  case 7:
	game_loss();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
  case 8:
	game_win();
	$gameid = 0;
	$charid = 0;
	header("Location: index.php?editor=main");
    	exit;	
  case 9:
	game_tie();
	$gameid = 0;
	$charid = 0;
	header("Location: index.php?editor=main");
    	exit;	
  case 10:
	game_over();
	$gameid = 0;
	$charid = 0;
	header("Location: index.php?editor=main");
    	exit;	 
  case 11:
	game_win_alliance();
	$gameid = 0;
	$charid = 0;
	header("Location: index.php?editor=main");
    	exit;	 
  case 12:
	all_lose();
	$gameid = 0;
	$charid = 0;
	header("Location: index.php?editor=main");
    	exit;
}

function all_lose() {
  global $mysql, $gameid;

  $query = "UPDATE players p
  INNER JOIN games_players gp ON p.id = gp.playerid
  SET p.losses = p.losses+1
  WHERE gp.gameid = $gameid";
  $mysql->query_no_result($query);

  $query = "UPDATE games SET active = 0 WHERE id = $gameid";
  $mysql->query_no_result($query);
}

function game_win() {
  global $mysql, $playerid, $gameid;

  $query = "UPDATE players SET wins = wins+1 WHERE id = $playerid";
  $mysql->query_no_result($query);

  $query = "UPDATE players p
  INNER JOIN games_players gp ON p.id = gp.playerid
  SET p.losses = p.losses+1 
  WHERE gp.gameid = $gameid AND p.id != $playerid";
  $mysql->query_no_result($query);

  $query = "UPDATE games SET active = 0 WHERE id = $gameid";
  $mysql->query_no_result($query);
}

function game_win_alliance() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "UPDATE players p
  INNER JOIN games_players gp ON p.id = gp.playerid
  SET p.wins = p.wins+1 
  WHERE gp.gameid = $gameid AND gp.alignment = (select alignment FROM games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid)";
  $mysql->query_no_result($query);

  $query = "UPDATE players p
  INNER JOIN games_players gp ON p.id = gp.playerid
  SET p.losses = p.losses+1 WHERE gp.gameid = $gameid AND p.id != $playerid AND gp.alignment != (select alignment FROM games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid)";
  $mysql->query_no_result($query);

  $query = "UPDATE games SET active = 0 WHERE id = $gameid";
  $mysql->query_no_result($query);
} 

function game_tie() {
  global $mysql, $gameid;

  $query = "UPDATE players p
  INNER JOIN games_players gp ON p.id = gp.playerid
  SET p.ties = p.ties+1 WHERE gp.gameid = $gameid";
  $mysql->query_no_result($query);

  $query = "UPDATE games SET active = 0 WHERE id = $gameid";
  $mysql->query_no_result($query);
}

function game_over() {
  global $mysql, $gameid;

  $query = "UPDATE games SET active = 0 WHERE id = $gameid";
  $mysql->query_no_result($query);
}
  
function has_game() {
  global $mysql, $playerid;

  $query = "select count(*) AS count from games_players gp inner join games g ON g.id = gp.gameid where gp.playerid = $playerid AND g.active = 1";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}

function get_games() {
  global $mysql;

  $query = "select count(*) AS count from games WHERE active = 1";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}

function create_game() {
  global $mysql, $playerid;

  $gamename = $_POST['gamename'];
  $death = $_POST['death'];
  $warlock = $_POST['warlock'];
  $quest = $_POST['quest'];
  $pending = $_POST['ending'];
  $sel_ending = $_POST['sel_ending'];

  $ending = 0;
  $revealed = 1;

  if($death != 1){
	$death = 0;
  }

  if($quest != 1){
	$quest = 0;
  }

  if($warlock != 1){
	$warlock = 0;
  }

  if($sel_ending > 0){
	$ending = $sel_ending;
  }
  if(($pending == 1 && $sel_ending == 0) || ($pending == 0 && $sel_ending == 0)) {
	$ending = 10;
  } 
  if($pending == 2 && $sel_ending == 0){
	$query = "SELECT id,name FROM endings WHERE revealed = 0 order by rand()";
   	$result = $mysql->query_mult_assoc($query);
   	if ($result) {
		$endings = array();
  		foreach ($result as $result) {
			array_push($endings, $result['id']);
  		}
    	 }
	$revealed = 0;
	$ending = $endings[rand(0, count($endings) - 1)];
  }
  if($pending == 3 && $sel_ending == 0){
	$query = "SELECT id,name FROM endings order by rand()";
   	$result = $mysql->query_mult_assoc($query);
   	if ($result) {
  		$endings = array();
  		foreach ($result as $result) {
			array_push($endings, $result['id']);
		}
    	 }
	$ending = $endings[rand(0, count($endings) - 1)];
  }

  if($ending == 11){
	$death = 1;
  }
  if($ending == 2 || $ending == 1){
	$warlock = 1;
	$quest = 1;
  }
  if($ending == 0){
	$ending = 10;
  }

  $query = "SELECT MAX(id) as id FROM games";
  $result = $mysql->query_assoc($query);
  $nextid = $result['id'] + 1;

  $query = "INSERT INTO games SET id = $nextid, name = \"$gamename\", active = 1, reaper= $death, ending=$ending, revealed=$revealed, warlock_quests = $warlock, quest_rewards = $quest";
  $mysql->query_no_result($query);

  return $nextid;
}	

function get_game_id() {
  global $mysql;

  $query = "select id,name from games WHERE active = 1";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function get_endings() {
  global $mysql;

  $query = "select id,name from endings WHERE id != 10 order by name";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  $arr[] = array("id"=>0, "name"=>"None");
  $array = $arr+$results;

  return $array;
}

function create_random_name(){

  $name_length = 4;
  $alpha_numeric = '0123456789';
	return substr(str_shuffle($alpha_numeric), 0, $name_length);
}
 
function join_game($gameid) {
  global $mysql, $playerid;

  $charid = 0;
  $query = "select charid from games_players WHERE gameid=$gameid AND playerid=$playerid";
  $result = $mysql->query_assoc($query);
  if($result['charid'])
  {
  	$charid = $result['charid'];
  }

  return $charid;
}

function delete_game($gameid) {
  global $mysql;

  $query = "DELETE FROM games WHERE id=$gameid";
  $mysql->query_no_result($query);

  $query = "DELETE FROM games_players WHERE gameid=$gameid";
  $mysql->query_no_result($query);
}

?>