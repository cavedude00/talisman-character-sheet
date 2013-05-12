<?php

switch ($action) {
  case 0:
	if(!$gameid){
		$body = new Template("templates/character/character.nogame.tmpl.php");
	}
	else
	{
		$charid = get_char($gameid);
		if($charid == 0)
		{
			$body = new Template("templates/character/character.select.tmpl.php");
			$body->set("charselect", random_char_select($gameid));
			$body->set("gameid", $gameid);
		}
		else
		{
			$opponents = get_opponents();
			if($opponents == 1){
				$oppid = get_opponent_id();
				$body = new Template("templates/opponents/opponents.default.tmpl.php");
				$body->set("charid", $charid);
				$body->set("gameid", $gameid);
				$body->set("opponents", get_opponent_toon($oppid)); 
       			$body->set("alignments", $alignments);
       			$body->set("movements", $movements);
       			$body->set('start', get_opp_start($oppid));
				$body->set('inventorydata', load_inventory($oppid));
				$body->set('followers', load_followers($oppid));
				$body->set('spells', load_spells($oppid));
				$body->set('mycharid',$charid);
				$body->set('multopps',0);
				$body->set('stats', get_opponent_stats($oppid));
				$body->set('rewards', get_opponent_rewards($oppid));
				$body->set('gamedata', get_game_data());
				$body->set('rewardcount', get_opponent_reward_count($oppid));
				$body->set('completequests', opponent_completed_quests($oppid));
			}
			else{
				$body = new Template("templates/opponents/opponents.select.tmpl.php");
				$body->set("charid", $charid);
				$body->set("gameid", $gameid);
				$body->set("opponents", get_opponents());
			}
		}
		
	}
	break;
  case 1:
	$body = new Template("templates/opponents/opponents.default.tmpl.php");
	$body->set("charid", $charid);
	$body->set("gameid", $gameid);
	$oppid = $_POST['oppid'];
	$body->set("opponents", get_opponent_toon($oppid)); 
       $body->set("alignments", $alignments);
       $body->set("movements", $movements);
       $body->set('start', get_opp_start($oppid));
	$body->set('inventorydata', load_inventory($oppid));
	$body->set('followers', load_followers($oppid));
	$body->set('spells', load_spells($oppid));
	$body->set('mycharid',$charid);
	$body->set('multopps',1);
	$body->set('stats', get_opponent_stats($oppid));
	break;
  case 2:
	$body = new Template("templates/opponents/opponents.select.tmpl.php");
	$body->set("charid", $charid);
	$body->set("gameid", $gameid);
	$body->set("opponents", get_opponents());
	break;
}

function get_opponents(){
  global $mysql, $gameid, $playerid;

  $query = "SELECT count(*) AS count FROM games_players WHERE playerid != $playerid AND gameid = $gameid AND life > 0";
  $result = $mysql->query_assoc($query);
  $opponent = $result['count'];

  if($opponent == 1){
     return 1;
  }

  else {
  	$query = "select gp.playerid,p.name FROM games_players gp
  	INNER JOIN players p ON p.id = gp.playerid
  	WHERE gp.gameid=$gameid AND gp.playerid != $playerid AND life > 0 order by name";
  	$results = $mysql->query_mult_assoc($query);
  	$array = $results;

  	return $array;
  }
}

function get_opponent_id(){
  global $mysql, $gameid, $playerid;
  
  $query = "SELECT playerid FROM games_players WHERE playerid != $playerid AND gameid = $gameid AND life > 0";
  $result = $mysql->query_assoc($query);
  $oppid = $result['playerid'];

  return $oppid;
}

function get_opponent_stats($oppid){
  global $mysql, $gameid;
  
  $query = "SELECT name,wins,losses,ties FROM players where id = $oppid";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function get_opponent_charid($oppid){
global $mysql, $gameid;

  $query = "SELECT charid from games_players WHERE gameid = $gameid AND playerid = $oppid AND life > 0";
  $result = $mysql->query_assoc($query);
  $ocharid = $result['charid'];

  return $ocharid;
}

function get_opponent_toon($oppid){
  global $mysql, $gameid;

  $ocharid = get_opponent_charid($oppid);

  $query = "SELECT * FROM games_players WHERE gameid = $gameid AND playerid = $oppid AND charid = $ocharid";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function opponent_completed_quests($oppid) {
  global $mysql, $gameid;

  $ocharid = get_opponent_charid($oppid);

  $query = "SELECT count(*) as count FROM games_quests where gameid = $gameid AND playerid = $oppid AND charid = $ocharid AND complete = 1";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}

function get_opponent_rewards($oppid){
  global $mysql, $gameid;

  $ocharid = get_opponent_charid($oppid);

  $query = "SELECT * FROM games_rewards WHERE gameid = $gameid AND playerid = $oppid AND charid = $ocharid AND discarded = 0";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function get_opponent_reward_count($oppid) {
  global $mysql, $gameid;

  $ocharid = get_opponent_charid($oppid);

  $query = "SELECT count(*) as count FROM games_rewards where gameid = $gameid AND playerid = $oppid AND charid = $ocharid AND discarded = 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}

function get_opp_start($oppid) {
  global $mysql;

  $ocharid = get_opponent_charid($oppid);

  $query = "SELECT start from characters WHERE id = $ocharid";
  $result = $mysql->query_assoc($query);
  $start = $result['start'];

  return $start;
}

function load_followers($oppid) {
  global $mysql, $gameid;

  $ocharid = get_opponent_charid($oppid);

  $query = "SELECT count(*) AS count from games_inventory gi 
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $oppid AND gi.charid = $ocharid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  if($count > 1){
     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type = 3 AND gi.gameid = $gameid AND gi.playerid = $oppid AND gi.charid = $ocharid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  }
  else
  {
     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type in (3,5) AND gi.gameid = $gameid AND gi.playerid = $oppid AND gi.charid = $ocharid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  }
     $results = $mysql->query_mult_assoc($query);

  return $results;
}

function load_inventory($oppid) {
  global $mysql, $gameid;

  $ocharid = get_opponent_charid($oppid);

  $query = "SELECT sum(i.object) AS max from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $oppid AND gi.gameid = $gameid AND gi.charid = $ocharid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND i.bag = 0";
  $result = $mysql->query_assoc($query);
  $maxobjects = $result['max'];

  if($maxobjects > 0)
  {
     if($maxobjects > 16)
     {
	 $maxobjects = 16;
     }
     $maxobjs = $maxobjects+4;

     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name,gi.lost from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type not in (3,5) AND i.ignorelimit = 0 AND gi.gameid = $gameid AND gi.playerid = $oppid AND gi.charid = $ocharid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND gi.inbag = 0 limit $maxobjs";
     $results = $mysql->query_mult_assoc($query);
  }
  else
  {
     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name,gi.lost from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type not in (3,5) AND i.ignorelimit = 0 AND gi.gameid = $gameid AND gi.playerid = $oppid AND gi.charid = $ocharid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0  AND gi.inbag = 0 limit 4";
     $results = $mysql->query_mult_assoc($query);
  }
  return $results;

}

function load_spells($oppid) {
  global $mysql, $gameid;

  $ocharid = get_opponent_charid($oppid);
 
   $query = "SELECT craft FROM games_players WHERE gameid = $gameid AND playerid = $oppid AND charid = $ocharid";
   $result = $mysql->query_assoc($query);
   $craft = $result['craft']; 

   if($craft == 3)
   {
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $oppid AND gs.charid = $ocharid AND gs.gameid = $gameid AND gs.discarded = 0 limit 1";
   }
   if($craft == 4 || $craft == 5)
   {
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $oppid AND gs.charid = $ocharid AND gs.gameid = $gameid AND gs.discarded = 0 limit 2";
   }
   if($craft > 5)
   {
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $oppid AND gs.charid = $ocharid AND gs.gameid = $gameid AND gs.discarded = 0 limit 3";
   }
   $results = $mysql->query_mult_assoc($query);

   return $results;
}
?>