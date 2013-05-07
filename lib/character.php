<?php

$objects = array(
  0 => 'Object',
  1 => 'Weapon',
  2 => 'Armour',
  3 => 'Follower',
  4 => 'Magical Object',
  5 => 'Horse'
);

switch ($action) {
  case 0:
	if(!$gameid){
		$body = new Template("templates/character/character.nogame.tmpl.php");
	}
	if($gameid){
		$charid = get_char($gameid);
		if($charid == 0)
		{
			$body = new Template("templates/character/character.select.tmpl.php");
			$body->set("charselect", random_char_select($gameid));
			$body->set("gameid", $gameid);
		}
		else
		{
			$body = new Template("templates/character/character.default.tmpl.php");
			$body->set('gameid', $gameid);
                     $body->set('charid', $charid);
                     $body->set("alignments", $alignments);
                     $body->set("movements", $movements);
			$body->set("objects", $objects);
			$body->set("chardata", get_character_data($gameid));
                     $body->set('inventorydata', load_inventory());
			$body->set('bonuses', load_inventory_bonuses());
			$body->set('start', get_char_start());
			$body->set('invcount', get_inventory_count());
			$body->set('followers', load_followers());
			$body->set('folcount', get_follower_count());
			$body->set('haslostitems', has_lost_items());
			$body->set('hasdroppeditems', has_dropped_items());
			$body->set('spells', load_spells());
			$body->set('spell_count', get_spell_count());
			$body->set('hasspellslot', has_open_spell_slot());
			$body->set('dspells', load_discarded_spells());
			$body->set('nextspellid', get_next_spell());
		}
	}
	break;
  case 1:
	$gameid = $_GET['gameid'];
       $charid = $_POST['charid'];
       if($charid < 1){
       	$charid = $_GET['charid'];
       }
	select_char($gameid,$charid);
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
  case 2:
	life_up();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
  case 3:
	$life = life_down();
       if($life == 0)
       {
		header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
	}
       else
       {
		header("Location: index.php?editor=character&gameid=$gameid");
	}
    	exit;
case 4:
	tstr_up();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 5:
	tstr_down();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 6:
	tcraft_up();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 7:
	tcraft_down();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 8:
	strength_up();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 9:
	strength_down();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 10:
	craft_up();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 11:
	craft_down();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 12:
	gold_up();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 13:
	gold_down();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 14:
	fate_up();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;
case 15:
	fate_down();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 16:
	$body = new Template("templates/character/character.alignment.tmpl.php");
       $body->set("alignments", $alignments);
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	break;
case 17:
	change_alignment();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 18:
	toad_me();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 19:
	untoad_me();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 20:
	collect_items();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 21:
	drop_inventory();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 22:
	$body = new Template("templates/character/inventory.add.tmpl.php");
       $body->set("objects", get_objects());
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	break;
case 23:
	add_inventory();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 24:
	$body = new Template("templates/character/follower.add.tmpl.php");
       $body->set("followers", get_followers());
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	break;
case 25:
	add_inventory();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 26:
	$body = new Template("templates/character/inventory.dropped.tmpl.php");
       $body->set("objects", get_dropped_objects());
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	break;
case 27:
	pick_up_inventory();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 28:
	drop_whole_inventory();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 29:
	discard_spell();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 30:
	choose_random_spell($playerid, $gameid, $charid);
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 31:
	draw_all_spells();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 32:
	claim_discarded_spell();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 33:
	$body = new Template("templates/character/character.nochar.tmpl.php");
	$body->set("characters", get_char_id());
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	break;
case 34:
	$body = new Template("templates/character/character.selectnew.tmpl.php");
	$body->set("charselect", random_char_select($gameid));
	$body->set('oldcharid', $charid);
	$body->set('gameid', $gameid);
	break;
case 35:
	$gameid = $_GET['gameid'];
	$oldcharid = $_GET['oldcharid'];
       $charid = $_POST['charid'];
       if($charid < 1){
       	$charid = $_GET['charid'];
       }
	select_char($gameid,$charid);
	copy_char($gameid,$charid,$oldcharid);
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
}

function get_char_id() {
  global $mysql;

  $query = "select id,name from characters order by name";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function random_char_select($gameid) {
  global $mysql;

  $query = "select id from characters WHERE id not in (select charid from games_players WHERE gameid = $gameid) and id > 0 order by name";
  $results = $mysql->query_mult_assoc($query);
  $array1 = $results;

  $a = array_rand($array1);
  if($a == 0){
	$a = array_rand($array1);
  }
  $query = "SELECT name from characters WHERE id = $a";
  $result = $mysql->query_assoc($query);
  $array[] = array("id"=>$a, "name"=>$result['name']);

  $b = array_rand($array1);
  if($a == $b || $b == 0){
	$b = array_rand($array1);
  }
  $query = "SELECT name from characters WHERE id = $b";
  $result = $mysql->query_assoc($query);
  $array[] = array("id"=>$b, "name"=>$result['name']);

  $c = array_rand($array1);
  if($c == $a || $c == $b || $c == 0){
  	$c = array_rand($array1);
  }
  $query = "SELECT name from characters WHERE id = $c";
  $result = $mysql->query_assoc($query);
  $array[] = array("id"=>$c, "name"=>$result['name']);

  return $array;
}

function copy_char($gameid,$charid,$oldcharid) {
  global $mysql, $playerid;

  $query = "select gold from games_players where charid = $oldcharid AND gameid = $gameid AND playerid = $playerid";
  $result = $mysql->query_assoc($query);
  $gold = $result['gold'];

  $query = "UPDATE games_players SET gold = $gold WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_spells SET discarded = 1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $oldcharid";
  $mysql->query_no_result($query);

  $query = "UPDATE players SET losses=losses+1 WHERE id = $playerid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET life = 0 WHERE playerid = $playerid AND charid = $oldcharid AND gameid = $gameid";
  $mysql->query_no_result($query);

  $query = "DELETE FROM games_inventory WHERE playerid = $playerid AND charid = $charid AND gameid = $gameid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  SET gi.charid = $charid
  WHERE gi.charid = $oldcharid AND gi.gameid = $gameid AND gi.playerid = $playerid AND i.type in (0,3,4,5)";
  $mysql->query_no_result($query);

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 1 AND gi.playerid = $playerid AND gi.charid = $oldcharid AND gi.gameid = $gameid";
  $result = $mysql->query_assoc($query);
  $weaponcount = $result['count'];

  if(($weaponcount < 2 && $charid == 36) || ($weaponcount == 0 && $charid != 20 && $charid != 24)){
  	$query = "UPDATE games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
	SET gi.charid = $charid
  	WHERE gi.charid = $oldcharid AND gi.gameid = $gameid AND gi.playerid = $playerid AND i.type = 1";
	$mysql->query_no_result($query);
  }
  else
  {	
	$query = "UPDATE games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
	SET gi.dropped = 1
  	WHERE gi.charid = $oldcharid AND gi.gameid = $gameid AND gi.playerid = $playerid AND i.type = 1";
	$mysql->query_no_result($query); 
  }

  if($charid != 20){
  	$query = "UPDATE games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
	SET gi.charid = $charid
  	WHERE gi.charid = $oldcharid AND gi.gameid = $gameid AND gi.playerid = $playerid AND i.type = 2";
	$mysql->query_no_result($query);
  }
  else
  {	
	$query = "UPDATE games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
	SET gi.dropped = 1
  	WHERE gi.charid = $oldcharid AND gi.gameid = $gameid AND gi.playerid = $playerid AND i.type = 2";
	$mysql->query_no_result($query); 
  }
}

function select_char($gameid,$charid) {
  global $mysql, $playerid;

  $query = "REPLACE INTO games_players SET charid = $charid, gold = 1, toad = 0, toad_strength = 1, toad_craft = 1, gameid = $gameid, playerid = $playerid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET strength = (select strength from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET craft = (select craft from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET fate = (select fate from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET life = (select life from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET alignment = (select alignment from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET gold = (select gold from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET movement = (select movement from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  if($charid == 4){

  	$left = any_items_left(11);
   	if($left == 1)
  	{
  		$query = "INSERT INTO games_inventory SET itemid = 11, gameid = $gameid, playerid = $playerid, charid = $charid";
		$mysql->query_no_result($query);
	}
  }
  if($charid == 7){
  	$left = any_items_left(10);
   	if($left == 1)
  	{
  		$query = "INSERT INTO games_inventory SET itemid = 10, gameid = $gameid, playerid = $playerid, charid = $charid";
		$mysql->query_no_result($query);
	}
  }
  if($charid == 12){
    	$left = any_items_left(7);
   	if($left == 1)
  	{
  		$query = "INSERT INTO games_inventory SET itemid = 7, gameid = $gameid, playerid = $playerid, charid = $charid";
		$mysql->query_no_result($query);
	}
  }
  if($charid == 15){
    	$left = any_items_left(2);
   	if($left == 1)
  	{
  		$query = "INSERT INTO games_inventory SET itemid = 2, gameid = $gameid, playerid = $playerid, charid = $charid";
		$mysql->query_no_result($query);
	}
       $lefta = any_items_left(6);
   	if($lefta == 1)
  	{
  		$query = "INSERT INTO games_inventory SET itemid = 6, gameid = $gameid, playerid = $playerid, charid = $charid";
		$mysql->query_no_result($query);
	}
  }
  if($charid == 8 || $charid == 13 || $charid == 17 || $charid == 23 || $charid == 24 || $charid == 25 || $charid == 27 || $charid == 28){
	choose_random_spell($playerid, $gameid, $charid);
  }
  if($charid == 16 || $charid == 21 || $charid == 29 || $charid == 35 || $charid == 37){
	choose_random_spell($playerid, $gameid, $charid);
	choose_random_spell($playerid, $gameid, $charid);
  }
}	

function get_character_data($gameid) {
  global $mysql, $playerid, $charid;

  $query = "SELECT strength,craft,fate,life,alignment,gold,toad,toad_strength,toad_craft,movement,lost_gold from games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $results = $mysql->query_mult_assoc($query);

  return $results;
}

function get_char_start() {
  global $mysql, $charid;

  $query = "SELECT start from characters WHERE id = $charid";
  $result = $mysql->query_assoc($query);
  $start = $result['start'];

  return $start;
}

function life_up() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET life = life+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function life_down() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET life = life-1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "select life from games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $result = $mysql->query_assoc($query);
  $currentlife = $result['life'];

  if($currentlife == 0)
  {
  	game_loss();
  }
  return $currentlife;
}

function tstr_up() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET toad_strength = toad_strength+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function tstr_down() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET toad_strength = toad_strength-1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function tcraft_up() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET toad_craft = toad_craft+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function tcraft_down() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET toad_craft = toad_craft-1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function strength_up() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET strength = strength+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function strength_down() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET strength = strength-1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function craft_up() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET craft = craft+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

 if($charid == 35){
	draw_all_spells();
  }
}

function craft_down() {
 global $mysql, $playerid, $gameid, $charid;
  
   $query = "UPDATE games_players SET craft = craft-1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
   $mysql->query_no_result($query);

   $query = "SELECT craft FROM games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
   $result = $mysql->query_assoc($query);
   $craft = $result['craft']; 

   $query = "SELECT count(*) AS count FROM games_spells WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND discarded = 0";
   $result = $mysql->query_assoc($query);
   $count = $result['count']; 

   if(($craft == 3 && $count > 1) || $craft < 3 || ($craft > 3 && $craft < 6 && $count > 2) || ($craft > 5 && $count > 3))
   {
   	$query = "UPDATE games_spells SET discarded = 1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND discarded = 0 limit 1";
	$mysql->query_no_result($query);
   }
}

function gold_up() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET gold = gold+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function gold_down() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET gold = gold-1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function fate_up() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET fate = fate+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function fate_down() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET fate = fate-1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function change_alignment() {
 global $mysql, $playerid, $gameid, $charid;
  
 $alignment = $_POST['alignment'];

 $query = "UPDATE games_players SET alignment = $alignment WHERE gameid = $gameid AND playerid = $playerid AND charid != 6 AND charid != 15";
  $mysql->query_no_result($query);
}

function toad_me() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET toad = 1, lost_gold = lost_gold+gold, gold = 0 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_inventory SET lost = 1, dropped = 1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0";
  $mysql->query_no_result($query);
}

function untoad_me() {
 global $mysql, $playerid, $gameid, $charid;
  
 $query = "UPDATE games_players SET toad = 0 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function collect_items() {
 global $mysql, $playerid, $gameid, $charid;

  $query = "UPDATE games_players SET gold = lost_gold, lost_gold = 0 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND lost_gold > 0";
  $mysql->query_no_result($query);

  $query = "SELECT count(*) AS hcount from games_inventory gi 
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $horsecount = $result['hcount'];

  if($horsecount > 0)
  {
  	$query = "UPDATE games_inventory gi
	INNER JOIN inventory i ON i.id = gi.itemid
	SET gi.lost = 0, gi.dropped = 0 WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type = 3 AND gi.itemid > 0";
  	$mysql->query_no_result($query);
  }
  else
  {
	$query = "UPDATE games_inventory gi
	INNER JOIN inventory i ON i.id = gi.itemid
	SET gi.lost = 0, gi.dropped = 0 WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type in (3,5) AND gi.itemid > 0";
  	$mysql->query_no_result($query);
  }

  $query1 = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.itemid > 0";
  $result1 = $mysql->query_assoc($query1);
  $count = $result1['count'];

  $query = "SELECT sum(i.object) AS max from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $maxobjects = $result['max'];

  if($count < $maxobjects+4)
  {
	$query = "SELECT count(*) AS count FROM games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
  	WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  	$result = $mysql->query_assoc($query);
  	$weaponcount = $result['count'];

	if(($charid != 36 && $charid != 20 && $weaponcount > 0) || ($charid == 36 && $weaponcount > 1) || ($charid == 24)){
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0 WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type not in (1,3,5) AND gi.itemid > 0";
  		$mysql->query_no_result($query);
  	}
       elseif($charid == 20){
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0  WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type NOT in (1,2,3,5) AND gi.itemid > 0";
  		$mysql->query_no_result($query);
  	}	
	else{
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0  WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type NOT in (3,5) AND gi.itemid > 0";
  		$mysql->query_no_result($query);
	}
  }

}

function load_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT sum(i.object) AS max from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
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
     WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 limit $maxobjs";
     $results = $mysql->query_mult_assoc($query);
  }
  else
  {
     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name,gi.lost from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 limit 4";
     $results = $mysql->query_mult_assoc($query);
  }
  return $results;

}

function has_lost_items() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS hcount from games_inventory gi 
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $horsecount = $result['hcount'];

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  if(($charid != 36 && $charid != 20 && $count > 0) || ($charid == 36 && $count > 1) || ($charid == 24)){
	if($horsecount > 0)
	{
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.lost = 1 AND gi.itemid > 0 AND i.type not in (1,5)";
	}
	else
	{	
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.lost = 1 AND gi.itemid > 0 AND i.type != 1";
	}
  }	
  elseif($charid == 20){
	if($horsecount > 0)
	{
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.lost = 1 AND gi.itemid > 0 AND i.type not in (1,2,5)";
	}
	else
	{	
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.lost = 1 AND gi.itemid > 0 AND i.type not in (1,2)";
	}
  }
  else{
  	if($horsecount > 0)
	{
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.lost = 1 AND gi.itemid > 0 AND i.type != 5";
	}
	else
	{	
		$query = "SELECT count(*) as count from games_inventory WHERE gameid = $gameid AND lost = 1 AND itemid > 0";
	}
  }
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  if($count > 0){
	$count = 1;
  }

  return $count;
}  

function has_dropped_items() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS hcount from games_inventory gi 
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $horsecount = $result['hcount'];

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  if(($charid != 36 && $charid != 20 && $count > 0) || ($charid == 36 && $count > 1) || ($charid == 24)){
	if($horsecount > 0)
	{
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0 AND i.type not in (1,5)";
	}
	else
	{	
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0 AND i.type != 1";
	}
  }	
  elseif($charid == 20){
	if($horsecount > 0)
	{
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0 AND i.type not in (1,2,5)";
	}
	else
	{	
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0 AND i.type not in (1,2)";
	}
  }
  else{
  	if($horsecount > 0)
	{
		$query = "SELECT count(*) AS count from games_inventory gi 
  		INNER JOIN inventory i ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0 AND i.type != 5";
	}
	else
	{	
		$query = "SELECT count(*) as count from games_inventory WHERE gameid = $gameid AND dropped = 1 AND itemid > 0";
	}
  }

  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  if($count > 0){
	$count = 1;
  }

  return $count;
}  

function load_inventory_bonuses() {
   global $mysql, $playerid, $gameid, $charid;
 
   
   $query = "SELECT sum(i.object) AS objectbon, sum(i.strength) AS strbon, sum(i.craft) AS craftbon, max(i.movement) AS movebon, max(i.talisman) AS talbon, max(i.warhorse) AS warbon from inventory i
   INNER join games_inventory gi ON gi.itemid = i.id
   WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
   $results = $mysql->query_mult_assoc($query);

  return $results;
}

function get_inventory_count() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}
  
function load_followers() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count from games_inventory gi 
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  if($count > 1){
     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type = 3 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  }
  else
  {
     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  }
     $results = $mysql->query_mult_assoc($query);

  return $results;
}
  
function get_follower_count() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}

function delete_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $itemid = $_GET['id'];

 $query = "DELETE FROM games_inventory WHERE id = $itemid AND gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0";
  $mysql->query_no_result($query);
}

function drop_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $itemid = $_GET['id'];

 $query = "UPDATE games_inventory SET dropped = 1 WHERE id = $itemid AND gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0";
  $mysql->query_no_result($query);
}

function drop_whole_inventory() {
  global $mysql, $playerid, $gameid, $charid;

 $query = "UPDATE games_inventory SET dropped = 1, lost = 1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET lost_gold = gold, gold = 0 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function get_objects() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  $query = "SELECT id,name,type FROM inventory";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
  	foreach ($result as $result) {

		$left = any_items_left($result['id']);
		if($left == 1)
		{
  			if(($charid != 36 && $charid != 20 && $count > 0) || ($charid == 36 && $count > 1) || ($charid == 24)){
				if($result['type'] != 1 && $result['type'] != 3 && $result['type'] != 5)
				{
					$array[] = array("id"=>$result['id'], "name"=>$result['name']);
  				}
			}
  			elseif($charid == 20){
				if($result['type'] != 1 && $result['type'] != 2 && $result['type'] != 3 && $result['type'] != 5)
				{
					$array[] = array("id"=>$result['id'], "name"=>$result['name']);
  				}
  			}
  			else{
  				if($result['type'] != 3 && $result['type'] != 5)
				{
					$array[] = array("id"=>$result['id'], "name"=>$result['name']);
  				}
  			}
  		}
	}
  }
  return $array;
}

function get_dropped_objects() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  $query = "SELECT count(*) AS hcount from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $horsecount = $result['hcount'];

  if(($charid != 36 && $charid != 20 && $count > 0) || ($charid == 36 && $count > 1) || ($charid == 24)){
	if($horsecount > 0)
	{
		$query = "SELECT i.id,i.name FROM inventory i
  		INNER JOIN games_inventory gi ON i.id = gi.itemid
  		WHERE i.type not in (1,5) AND gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0";
	}
	else
	{	
		$query = "SELECT i.id,i.name FROM inventory i
  		INNER JOIN games_inventory gi ON i.id = gi.itemid
  		WHERE i.type != 1 AND gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0";
	}
  }	
  elseif($charid == 20){
	if($horsecount > 0)
	{
		$query = "SELECT i.id,i.name FROM inventory i
  		INNER JOIN games_inventory gi ON i.id = gi.itemid
  		WHERE i.type not in (1,2,5) AND gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0";
	}
	else
	{	
		$query = "SELECT i.id,i.name FROM inventory i
  		INNER JOIN games_inventory gi ON i.id = gi.itemid
  		WHERE i.type not in (1,2) AND gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0";
	}
  }
  else{
  	if($horsecount > 0)
	{
		$query = "SELECT i.id,i.name FROM inventory i
  		INNER JOIN games_inventory gi ON i.id = gi.itemid
  		WHERE i.type != 5 AND gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0";
	}
	else
	{	
		$query = "SELECT i.id,i.name FROM inventory i
  		INNER JOIN games_inventory gi ON i.id = gi.itemid
  		WHERE gi.gameid = $gameid AND gi.dropped = 1 AND gi.itemid > 0";
	}
  }
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

  return $array;
}

function get_followers() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count from games_inventory gi 
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  $query = "SELECT id,name,type FROM inventory";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
  	foreach ($result as $result) {

		$left = any_items_left($result['id']);
		if($left == 1)
		{
  			if($count == 0){
				if($result['type'] == 3 || $result['type'] == 5)
				{
					$array[] = array("id"=>$result['id'], "name"=>$result['name']);
  				}
    			}
  			else
  			{
				if($result['type'] == 3)
				{
					$array[] = array("id"=>$result['id'], "name"=>$result['name']);
  				}
			}
		}
	}

  }
  return $array;
}

function add_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $objectid = $_POST['objectid'];

   $left = any_items_left($objectid);
   if($left == 1)
   {
   	$query = "INSERT INTO games_inventory SET itemid = $objectid, gameid = $gameid, playerid = $playerid, charid = $charid, lost = 0, dropped = 0";
   	$mysql->query_no_result($query);
   }
}

function pick_up_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $objectid = $_POST['objectid'];

   $query = "UPDATE games_inventory SET playerid = $playerid, charid = $charid, dropped = 0, lost = 0 WHERE itemid = $objectid AND dropped = 1 limit 1";
  $mysql->query_no_result($query);
}

function any_items_left($objectid){
    global $mysql;

   $bool = 0;

   $query = "SELECT count(*) AS count FROM games_inventory WHERE itemid = $objectid";
   $result = $mysql->query_assoc($query);
   $count = $result['count'];

   $query = "SELECT qty FROM inventory WHERE id = $objectid";
   $result = $mysql->query_assoc($query);
   $qty = $result['qty'];

   if($count >= $qty)
   {
	$bool = 0;
   }
   else
   {
   	$bool = 1;
   }
   return $bool;
}

function any_spells_left($spellid){
    global $mysql;

   $bool = 0;

   $query = "SELECT count(*) AS count FROM games_spells WHERE spellid = $spellid";
   $result = $mysql->query_assoc($query);
   $count = $result['count'];

   $query = "SELECT qty FROM spells WHERE id = $spellid";
   $result = $mysql->query_assoc($query);
   $qty = $result['qty'];

   if($count >= $qty)
   {
	$bool = 0;
   }
   else
   {
   	$bool = 1;
   }
   return $bool;
}

function load_spells() {
  global $mysql, $playerid, $gameid, $charid;
 
   $query = "SELECT craft FROM games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
   $result = $mysql->query_assoc($query);
   $craft = $result['craft']; 

   if($craft == 3)
   {
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $playerid AND gs.charid = $charid AND gs.gameid = $gameid AND gs.discarded = 0 limit 1";
   }
   if($craft == 4 || $craft == 5)
   {
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $playerid AND gs.charid = $charid AND gs.gameid = $gameid AND gs.discarded = 0 limit 2";
   }
   if($craft > 5)
   {
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $playerid AND gs.charid = $charid AND gs.gameid = $gameid AND gs.discarded = 0 limit 3";
   }
   $results = $mysql->query_mult_assoc($query);

   return $results;
}

function get_spell_count() {
   global $mysql, $playerid, $gameid, $charid;
 
   $query = "SELECT count(*) AS count FROM games_spells WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND discarded = 0";
   $result = $mysql->query_assoc($query);
   $count = $result['count']; 

   return $count;
}

function discard_spell() {
   global $mysql, $playerid, $gameid, $charid;

  $spellid = $_GET['spellid'];

  $query = "UPDATE games_spells SET discarded = 1 WHERE spellid = $spellid AND gameid = $gameid AND playerid = $playerid AND charid = $charid AND discarded = 0 limit 1";
  $mysql->query_no_result($query);

  if($charid == 17 || $charid == 27)
  {
	$count = get_spell_count();
	if($count == 0){
		choose_random_spell($playerid, $gameid, $charid);
	}
  }
  if($charid == 25 || $charid == 37){
	choose_random_spell($playerid, $gameid, $charid);
  }
  if($charid == 29)
  {
	$count = get_spell_count();
	if($count == 0){
		choose_random_spell($playerid, $gameid, $charid);
		choose_random_spell($playerid, $gameid, $charid);

	}
       elseif($count == 1){
		choose_random_spell($playerid, $gameid, $charid);
	}
  }
  if($charid == 35){
	draw_all_spells();
  }
}

function has_open_spell_slot() {
  global $mysql, $playerid, $gameid, $charid;

  $count = get_spell_count();

  $query = "SELECT craft FROM games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $result = $mysql->query_assoc($query);
  $craft = $result['craft']; 

  $bool = 0;

  if(($count == 0 && $craft > 2) || ($count < 2 && $craft > 3) || ($count < 3 && $craft > 5)){
  	$bool = 1;
  }

  return $bool;
}
  	
function choose_random_spell($playerid, $gameid, $charid) {
   global $mysql;
	
   $used = all_spells_used();
   if($used == 1)
   {
      $query = "DELETE FROM games_spells WHERE discarded = 1";
      $mysql->query_no_result($query);
   }

   $query = "SELECT id,name FROM spells";
   $result = $mysql->query_mult_assoc($query);
   if ($result) {
  	 foreach ($result as $result) {
		$left = any_spells_left($result['id']);
		if($left == 1)
		{
			$array[] = array("id"=>$result['id'], "name"=>$result['name']);
  		}
    	 }
   }
   $spell = array_rand($array);

   $query = "SELECT nextspellid FROM games WHERE id = $gameid";
   $result = $mysql->query_assoc($query);
   $nextspell = $result['nextspellid']; 

   if($nextspell == 0){
	$nextspell = rand(1,86);
   }

   $open = has_open_spell_slot();
   if($open == 1){
   	$query = "INSERT INTO games_spells SET charid = $charid, gameid = $gameid, playerid = $playerid, spellid = $nextspell, discarded = 0";
   	$mysql->query_no_result($query);

       $query = "UPDATE games set nextspellid = $spell WHERE id = $gameid";
       $mysql->query_no_result($query);
   }
   
}

function all_spells_used(){
    global $mysql;

   $bool = 0;

   $query = "SELECT count(*) AS count FROM games_spells";
   $result = $mysql->query_assoc($query);
   $count = $result['count'];

   $query = "SELECT sum(qty) AS qty FROM spells";
   $result = $mysql->query_assoc($query);
   $qty = $result['qty'];

   if($count >= $qty)
   {
	$bool = 1;
   }
   else
   {
   	$bool = 0;
   }
   return $bool;
}

function draw_all_spells() {
  global $mysql, $playerid, $gameid, $charid;

  $i = 1;
  $open = 0;

  while($i < 4){
  	$open = has_open_spell_slot();
	if($open == 1){
		choose_random_spell($playerid, $gameid, $charid);
	}
	$i++;
  }
}

function load_discarded_spells(){
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
  INNER JOIN spells s ON s.id = gs.spellid
  WHERE gs.discarded = 1 limit 20";
  $results = $mysql->query_mult_assoc($query);

  return $results;
}

function claim_discarded_spell(){
  global $mysql, $playerid, $gameid, $charid;
 
  $spellid = $_GET['spellid'];

  $open = has_open_spell_slot();
  if($open == 1){
  	$query = "UPDATE games_spells SET charid = $charid, gameid = $gameid, playerid = $playerid, discarded = 0 WHERE spellid = $spellid AND discarded = 1 limit 1";
   	$mysql->query_no_result($query);
  }
}

function get_next_spell(){
  global $mysql, $gameid;

   $query = "SELECT nextspellid FROM games WHERE id = $gameid";
   $result = $mysql->query_assoc($query);
   $nextspell = $result['nextspellid']; 

   return $nextspell;
}

?>