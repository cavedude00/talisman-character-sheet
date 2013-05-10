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
			$body->set("quests", load_quests());
			$body->set("bahquests", load_quests());
			$body->set("qcount", quest_count());
			$body->set("allcomplete", all_complete());
       	}
	}
  break;
  case 1:
     reveal_ending();
     header("Location: index.php?editor=objectives&gameid=$gameid&charid=$charid");
     exit;	
  case 2:
     get_random_quest();
     header("Location: index.php?editor=objectives&gameid=$gameid&charid=$charid");
     exit;
  case 3:
     complete_quest();
     header("Location: index.php?editor=objectives&gameid=$gameid&charid=$charid");
     exit;
  case 4:
	$body = new Template("templates/objectives/quest.select.tmpl.php");
	$body->set("quests", get_quests());
	$body->set("playerid", $playerid);
	$body->set("charid", $charid);
	$body->set("gameid", $gameid);
	break;
  case 5:
     insert_quest();
     header("Location: index.php?editor=objectives&gameid=$gameid&charid=$charid");
     exit;
}

function get_game_variables(){
  global $mysql, $gameid;

  $query = "SELECT ending,reaper,revealed,warlock_quests,quest_rewards FROM games where id = $gameid";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function reveal_ending(){
  global $mysql, $gameid;

  $query = "UPDATE games set revealed = 1 where id = $gameid";
  $mysql->query_no_result($query);

}

function complete_quest(){
  global $mysql, $playerid, $gameid, $charid;

  $questid = $_GET['id'];

  $query = "UPDATE games_quests SET complete = 1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND questid = $questid";
  $mysql->query_no_result($query);

}

function load_quests() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT gq.questid,q.name AS qname,gq.complete FROM games_quests gq
  INNER JOIN quests q ON q.id = gq.questid
  WHERE gq.playerid = $playerid AND gq.charid = $charid AND gq.gameid = $gameid limit 8";
  $results = $mysql->query_mult_assoc($query);

   return $results;
}

function quest_count(){
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count FROM games_quests WHERE charid = $charid AND gameid = $gameid AND playerid = $playerid";
  $result = $mysql->query_assoc($query);
  $count = $result['count']; 

  return $count;
}

function all_complete(){
  global $mysql, $playerid, $gameid, $charid;

  $bool = 0;

  $query = "SELECT count(*) AS count FROM games_quests WHERE charid = $charid AND gameid = $gameid AND playerid = $playerid";
  $result = $mysql->query_assoc($query);
  $count = $result['count']; 

  $query = "SELECT count(*) AS ccount FROM games_quests WHERE charid = $charid AND gameid = $gameid AND playerid = $playerid AND complete = 1";
  $result = $mysql->query_assoc($query);
  $ccount = $result['ccount']; 

  if($count <= $ccount){
	$bool = 1;
  }

  return $bool;
}

function get_quests() {
  global $mysql;

  $query = "SELECT id,name FROM quests order by name";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
	foreach ($result as $result) {
		$qid = $result['id'];
		$query = "SELECT count(*) AS count FROM games_quests WHERE questid = $qid";
   		$result1 = $mysql->query_assoc($query);
   		$count = $result1['count']; 
		if($count == 0){
			$quests[] = array("id"=>$result['id'], "name"=>$result['name']);
		}
	}
  }
  return $quests;
}

function insert_quest() {
  global $mysql, $playerid, $gameid, $charid;

  $questid = $_POST['questid'];

  $query = "INSERT INTO games_quests SET questid = $questid, gameid = $gameid, playerid = $playerid, charid = $charid";
  $mysql->query_no_result($query);
}
?>