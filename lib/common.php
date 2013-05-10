<?php

function get_char($gameid) {
  global $mysql, $playerid;

  $query = "select charid from games_players where playerid = $playerid AND gameid = $gameid AND life > 0";
  $result = $mysql->query_assoc($query);
  $char = $result['charid'];

  return $char;
}

function game_loss(){
  global $mysql, $playerid, $gameid, $charid;

 	$query = "UPDATE players SET losses = losses+1 WHERE id = $playerid";
  	$mysql->query_no_result($query);

       $query = "UPDATE games_players SET life = 0 WHERE playerid = $playerid AND gameid = $gameid AND charid = $charid";
  	$mysql->query_no_result($query);

       $query = "UPDATE games_inventory SET dropped = 1 WHERE playerid = $playerid AND gameid = $gameid AND charid = $charid";
  	$mysql->query_no_result($query);

       $query = "UPDATE games_spells SET discarded = 1 WHERE playerid = $playerid AND gameid = $gameid AND charid = $charid";
  	$mysql->query_no_result($query);
}

function random_char_select($gameid) {
  global $mysql;

  $query = "select id from characters WHERE id not in (select charid from games_players WHERE gameid = $gameid) and id > 0 order by rand() limit 3";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function get_random_quest() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT id,name FROM quests";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
	$quests = array();
	foreach ($result as $result) {
		$qid = $result['id'];
		$query = "SELECT count(*) AS count FROM games_quests WHERE questid = $qid";
   		$result1 = $mysql->query_assoc($query);
   		$count = $result1['count']; 
		if($count == 0){
			array_push($quests, $result['id']);
		}
	}
  }
  $quest = $quests[rand(0, count($quests) - 1)];

  $query = "SELECT count(*) AS count FROM games_quests WHERE AND charid = $charid AND gameid = $gameid AND playerid = $playerid";
  $result = $mysql->query_assoc($query);
  $qcount = $result['qcount']; 

  if($qcount < 9){
	$query = "INSERT INTO games_quests SET questid = $quest, charid = $charid, gameid = $gameid, playerid = $playerid";
   	$mysql->query_no_result($query);
  }
}

?>