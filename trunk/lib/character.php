<?php

$objects = array(
  0 => 'Object',
  1 => 'Weapon',
  2 => 'Armour',
  3 => 'Follower',
  4 => 'Magical Object',
  5 => 'Horse'
);

$deck = array(
  1 => 'Purchase',
  2 => 'Stable',
  3 => 'Adventure',
  4 => 'Relic',
  5 => 'Treasure',
  6 => 'Highland',
  7 => 'Dungeon'
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
			$body->set('inventoryfree', has_free_inventory_slot());
			$body->set('relic', get_random_item(16,255,1));
			$body->set('treasure', get_random_item(32,255,1));
			$body->set('has_bag', has_bag());
			$body->set('bagdata', load_bags());
			$body->set('bagcount', get_bag_count());
			$body->set('rewards', load_rewards());
			$body->set('completequests', completed_quests());
			$body->set('gamedata', get_game_data());
			$body->set('rewardcount', get_reward_count());
			$body->set('rbonuses', load_rewards_bonuses());
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
case 22: // Objects
	$body = new Template("templates/character/object.add.tmpl.php");
       $body->set("objects", get_objects(207,23));
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	break;
case 23:
	add_inventory();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 24: // Followers
	$body = new Template("templates/character/object.add.tmpl.php");
       $body->set("objects", get_objects(207,40));
	$body->set('gameid', $gameid);
       $body->set('charid', $charid);
	break;
case 25:
	add_inventory();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 26: // Dropped Objects
	$body = new Template("templates/character/object.add.tmpl.php");
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
case 36:
	get_random_item(16,255,0);
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 37: // Treasure
	$body = new Template("templates/character/object.add.tmpl.php");
      $body->set("objects", get_objects(32,63));
	$body->set('gameid', $gameid);
      $body->set('charid', $charid);
	break;
case 38: // Add to bag
	$body = new Template("templates/character/object.add.tmpl.php");
      $body->set("objects", get_objects(207,23));
	$body->set('gameid', $gameid);
      $body->set('charid', $charid);
	$body->set('isbag', 1);
	break;
case 39:
	add_bag();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 40:
	heal();
	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
    	exit;	
case 41:
	$body = new Template("templates/character/spell.select.tmpl.php");
	$body->set("spells", get_spells());
	$body->set("playerid", $playerid);
	$body->set("charid", $charid);
	$body->set("gameid", $gameid);
	break;
case 42:
      insert_spell();
      header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
      exit;
case 43:
      discard_inventory();
      header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
      exit;
case 44:
      copy_inventory_to_bag();
      header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
      exit;
case 45:
      copy_bag_to_inventory();
      header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
      exit;
case 46:
      choose_random_reward();
      header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
      exit;
case 47:
      $value = $_GET['value'];
      $rewardid = $_GET['rewardid'];
      discard_reward($value);
	if($rewardid == 11){
      	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid&action=48");
      }
	if($rewardid == 12){
      	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid&action=49");
      }
      if($rewardid == 14){
      	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid&action=16");
      }
      else{
      	header("Location: index.php?editor=character&gameid=$gameid&charid=$charid");
      }
      exit;
case 48: // Stable
	$body = new Template("templates/character/object.add.tmpl.php");
      $body->set("objects", get_objects(4,63));
	$body->set('gameid', $gameid);
      $body->set('charid', $charid);
	break;
case 49: // Purchase
	$body = new Template("templates/character/object.add.tmpl.php");
      $body->set("objects", get_objects(2,63));
	$body->set('gameid', $gameid);
      $body->set('charid', $charid);
	break;
}

function get_char_id() {
  global $mysql;

  $query = "select id,name from characters order by name";
  $results = $mysql->query_mult_assoc($query);
  $array = $results;

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

  $query = "UPDATE games_quests SET charid = $charid WHERE gameid = $gameid AND playerid = $playerid AND charid = $oldcharid";
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

  $query = "UPDATE games_players SET max_fate = (select fate from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET fate = max_fate WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET max_life = (select life from characters where id = $charid) WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET life = max_life WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
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

  $query = "select ending from games where id = $gameid";
  $result = $mysql->query_assoc($query);
  $ending = $result['ending'];

  $query = "select count(*) as qcount from games_quests where gameid = $gameid AND playerid = $playerid";
  $result = $mysql->query_assoc($query);
  $qcount = $result['qcount'];

  if($ending == 2){
	if($qcount > 0){
		$query = "UPDATE games_quests SET charid = $charid WHERE gameid = $gameid AND playerid = $playerid";
  		$mysql->query_no_result($query);
	}
	else{
		get_random_quest();
		get_random_quest();
		get_random_quest();
		get_random_quest();
	}
  }
  
}	

function get_character_data($gameid) {
  global $mysql, $playerid, $charid;

  $query = "SELECT strength,craft,fate,life,alignment,gold,toad,toad_strength,toad_craft,movement,lost_gold,max_life,max_fate from games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
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
  
 $query = "UPDATE games_players SET max_life = max_life+1, life = life+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function heal() {
 global $mysql, $playerid, $gameid, $charid;
  
$query = "SELECT max_life,life from games_players WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $result = $mysql->query_assoc($query);
  $health = $result['max_life'];
  $curlife = $result['life'];
  
  if($curlife+1 <= $health){
 	$query = "UPDATE games_players SET life = life+1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  	$mysql->query_no_result($query);
  }
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
  
 $alignment = $_GET['alignment'];

 $query = "UPDATE games_players SET alignment = $alignment WHERE gameid = $gameid AND playerid = $playerid AND charid != 6 AND charid != 15";
  $mysql->query_no_result($query);
}

function toad_me() {
 global $mysql, $playerid, $gameid, $charid;
  
  $query = "UPDATE games_players SET toad = 1, lost_gold = lost_gold+gold, gold = 0 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "UPDATE games_inventory SET lost = 1, dropped = 1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0 AND dropped = 0";
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
  WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.itemid > 0 AND gi.inbag = 0 AND gi.lost = 1 AND gi.dropped = 1 OR i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.itemid > 0 AND gi.inbag = 0 AND gi.lost = 0 AND gi.dropped = 0";
  $result1 = $mysql->query_assoc($query1);
  $count = $result1['count'];

  $query = "SELECT sum(i.object) AS max from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.itemid > 0 AND i.bag = 0 AND gi.lost = 1 AND gi.dropped = 1 OR gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.itemid > 0 AND i.bag = 0 AND gi.lost = 0 AND gi.dropped = 0";
  $result = $mysql->query_assoc($query);
  $maxobjects = $result['max'];

  if($count <= $maxobjects+4)
  {
	$query = "SELECT count(*) AS count FROM games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
  	WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  	$result = $mysql->query_assoc($query);
  	$weaponcount = $result['count'];

	if(($charid != 36 && $charid != 20 && $weaponcount > 0) || ($charid == 36 && $weaponcount > 1) || ($charid == 24)){
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0 WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type not in (1,3,5) AND gi.itemid > 0 AND gi.lost = 1 AND gi.dropped = 1 AND gi.inbag = 0";
  		$mysql->query_no_result($query);
  	}
       elseif($charid == 20){
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0  WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type NOT in (1,2,3,5) AND gi.itemid > 0 AND gi.lost = 1 AND gi.dropped = 1 AND gi.inbag = 0";
  		$mysql->query_no_result($query);
  	}	
	else{
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0  WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type NOT in (3,5) AND gi.itemid > 0 AND gi.lost = 1 AND gi.dropped = 1 AND gi.inbag = 0";
  		$mysql->query_no_result($query);
	}
  }

  $query1 = "SELECT count(*) AS bagcount FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.itemid > 0 AND gi.inbag = 1 AND gi.lost = 1 AND gi.dropped = 1 OR i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.itemid > 0 AND gi.inbag = 1 AND gi.lost = 0 AND gi.dropped = 0";
  $result1 = $mysql->query_assoc($query1);
  $bagcount = $result1['bagcount'];

  $query = "SELECT sum(i.object) AS bagmax from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.itemid > 0 AND i.bag = 0 AND gi.lost = 1 AND gi.dropped = 1 OR gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.itemid > 0 AND i.bag = 0 AND gi.lost = 0 AND gi.dropped = 0";
  $result = $mysql->query_assoc($query);
  $bagmaxobjects = $result['bagmax'];

  if($bagcount <= $bagmaxobjects)
  {
	$query = "SELECT count(*) AS count FROM games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
  	WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  	$result = $mysql->query_assoc($query);
  	$weaponcount = $result['count'];

	if(($charid != 36 && $charid != 20 && $weaponcount > 0) || ($charid == 36 && $weaponcount > 1) || ($charid == 24)){
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0 WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type not in (1,3,5) AND gi.itemid > 0 AND gi.lost = 1 AND gi.dropped = 1 AND gi.inbag = 1";
  		$mysql->query_no_result($query);
  	}
       elseif($charid == 20){
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0  WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type NOT in (1,2,3,5) AND gi.itemid > 0 AND gi.lost = 1 AND gi.dropped = 1 AND gi.inbag = 1";
  		$mysql->query_no_result($query);
  	}	
	else{
		$query = "UPDATE games_inventory gi
		INNER JOIN inventory i ON i.id = gi.itemid
		SET gi.lost = 0, gi.dropped = 0  WHERE gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND i.type NOT in (3,5) AND gi.itemid > 0 AND gi.lost = 1 AND gi.dropped = 1 AND gi.inbag = 1";
  		$mysql->query_no_result($query);
	}
  }

}

function load_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT sum(i.object) AS max from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND i.bag = 0";
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
     WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND gi.inbag = 0 limit $maxobjs";
     $results = $mysql->query_mult_assoc($query);
  }
  else
  {
     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name,gi.lost from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND gi.inbag = 0 limit 4";
     $results = $mysql->query_mult_assoc($query);
  }
  return $results;

}

function load_bags() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT sum(i.object) AS max from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND i.bag = 1";
  $result = $mysql->query_assoc($query);
  $maxobjects = $result['max'];

  if($maxobjects > 0)
  {
     if($maxobjects > 8)
     {
	 $maxobjects = 8;
     }

     $query = "SELECT gi.id,gi.itemid,gi.playerid,gi.gameid,i.name,gi.lost from games_inventory gi 
     INNER JOIN inventory i ON i.id = gi.itemid
     WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND gi.inbag = 1 limit $maxobjects";
     $results = $mysql->query_mult_assoc($query);
  }

  return $results;

}

function has_free_inventory_slot(){
  global $mysql, $playerid, $gameid, $charid;

  $bool = 0;

  $query = "SELECT sum(i.object) AS max from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND i.bag = 0";
  $result = $mysql->query_assoc($query);
  $maxobjects = $result['max'];

  $maxobjects = $maxobjects+4;

  if($maxobjects > 20){
	$maxobjects = 20;
  }

  $query = "SELECT count(*) AS itemcount FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND gi.inbag = 0";
  $result = $mysql->query_assoc($query);
  $itemcount = $result['itemcount'];
  
  $query = "SELECT sum(i.object) AS bagmax from inventory i
  INNER join games_inventory gi ON gi.itemid = i.id
  WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND i.bag = 1";
  $result = $mysql->query_assoc($query);
  $bagmax = $result['bagmax'];

  $query = "SELECT count(*) as bagcount FROM games_inventory WHERE gameid = $gameid AND charid = $charid AND playerid = $playerid AND dropped = 0 AND lost = 0 AND inbag = 1";
  $result = $mysql->query_assoc($query);
  $bagcount = $result['bagcount'];

  if($itemcount < $maxobjects){ 
	$bool = 1;
  }

  elseif($bagcount < $bagmax){
	$bool = 2;
  }

  return $bool;
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

function has_bag() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count from games_inventory gi 
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE gi.gameid = $gameid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND i.bag = 1 AND playerid = $playerid AND charid = $charid";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

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
 
   $query = "SELECT sum(i.object) AS objectbon, sum(i.strength) AS strbon, sum(i.craft) AS craftbon, max(i.movement) AS movebon, max(i.talisman) AS talbon, max(i.warhorse) AS warbon, sum(i.perm_strength) AS pstrbon, sum(i.perm_craft) AS pcraftbon from inventory i
   INNER join games_inventory gi ON gi.itemid = i.id
   WHERE gi.playerid = $playerid AND gi.gameid = $gameid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
   $results = $mysql->query_mult_assoc($query);
   
  return $results;
}

function load_rewards_bonuses() {
   global $mysql, $playerid, $gameid, $charid;
 
   $query = "SELECT sum(r.life) AS rlifebon, sum(r.strength) AS rstrbon, sum(r.craft) AS rcraftbon, sum(r.fate) AS rfatebon, sum(r.gold) AS rgoldbon from rewards r
   INNER join games_rewards gr ON gr.rewardid = r.id
   WHERE gr.playerid = $playerid AND gr.gameid = $gameid AND gr.charid = $charid AND gr.discarded = 0 AND gr.complete = 0 AND r.discard = 0";
   $results = $mysql->query_mult_assoc($query);

  return $results;
}

function get_inventory_count() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND gi.inbag = 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}
  
function get_bag_count() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) AS count FROM games_inventory gi
  INNER JOIN inventory i ON i.id = gi.itemid
  WHERE i.type not in (3,5) AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0 AND gi.inbag = 1";
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

function discard_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $id = $_GET['id'];

 $query = "DELETE FROM games_inventory WHERE id = $id AND gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);
}

function drop_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $itemid = $_GET['id'];

  $query = "SELECT itemid as bagid from games_inventory where id = $itemid";
  $result = $mysql->query_assoc($query);
  $bagid = $result['bagid'];

  $query = "SELECT bag from inventory where id = $bagid";
  $result = $mysql->query_assoc($query);
  $bag = $result['bag'];

  if($bag == 1){
  $query = "DELETE FROM games_inventory WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0 AND inbag = 1";
  $mysql->query_no_result($query);
  }

  $query = "UPDATE games_inventory SET dropped = 1 WHERE id = $itemid AND gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0";
  $mysql->query_no_result($query);
}

function drop_whole_inventory() {
  global $mysql, $playerid, $gameid, $charid;

 $query = "UPDATE games_inventory SET dropped = 1, lost = 1 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0";
  $mysql->query_no_result($query);

  $query = "UPDATE games_players SET lost_gold = gold, gold = 0 WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid";
  $mysql->query_no_result($query);

  $query = "DELETE FROM games_inventory WHERE gameid = $gameid AND playerid = $playerid AND charid = $charid AND itemid > 0 AND inbag = 1";
  $mysql->query_no_result($query);
}

function get_objects($bit,$objecttype) {
  global $mysql, $playerid, $gameid, $charid;

  $deck = -1;

  if($bit & 1){
	$deck = 0;
  }
  $deck0 = $deck; $deck = -1;

  if($bit & 2){
	$deck = 1;
  } 
  $deck1 = $deck; $deck = -1;

  if($bit & 4){
	$deck = 2;
  } 
  $deck2 = $deck; $deck = -1;

  if($bit & 8){
	$deck = 3;
  } 
  $deck3 = $deck; $deck = -1;

  if($bit & 16){
	$deck = 4;
  } 
  $deck4 = $deck; $deck = -1;

  if($bit & 32){
	$deck = 5;
  } 
  $deck5 = $deck; $deck = -1;

  if($bit & 64){
	$deck = 6; 
  } 
  $deck6 = $deck; $deck = -1;

  if($bit & 128){
	$deck = 7;
  } 
  $deck7 = $deck; $deck = -1;  
    

  $type = -1;

  if($objecttype & 1){
	$type = 0;
  }
  $type0 = $type; $type = -1;

  if($objecttype & 2){
	$type = 1;
  }
  $type1 = $type; $type = -1;

  if($objecttype & 4){
	$type = 2;
  }
  $type2 = $type; $type = -1;

  if($objecttype & 8){
	$type = 3;
  }
  $type3 = $type; $type = -1;

  if($objecttype & 16){
	$type = 4;
  }
  $type4 = $type; $type = -1;

  if($objecttype & 32){
	$type = 5;
  }
  $type5 = $type; $type = -1;
  
  if($type1 == 1){
  	$query = "SELECT count(*) AS count FROM games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
  	WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  	$result = $mysql->query_assoc($query);
  	$count = $result['count'];

	if(($charid != 36 && $count > 0) || ($charid == 36 && $count > 1) || ($charid == 24) || ($charid == 20)){
		$type1 = -1;
	}
  }
  
  if($type2 == 2){
	if($charid == 20){
		$type2 = -1;
	}
  }

  if($type5 == 5){
  	$query = "SELECT count(*) AS hcount FROM games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
  	WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  	$result = $mysql->query_assoc($query);
  	$hcount = $result['hcount'];

	if($hcount > 0){
		$type5 = -1;
      }
  }

  $query = "SELECT id,name,type FROM inventory WHERE deck in($deck0,$deck1,$deck2,$deck3,$deck4,$deck5,$deck6,$deck7) AND type in ($type0,$type1,$type2,$type3,$type4,$type5) group by name";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
  	foreach ($result as $result) {

		$left = any_items_left($result['id']);
		if($left == 1)
		{
			$array[] = array("id"=>$result['id'], "name"=>$result['name']);
  		}
	}
  }
  return $array;
}

function get_random_item($bit,$objecttype,$dquery) {
  global $mysql, $playerid, $gameid, $charid;

  $deck = -1;

  if($bit & 1){
	$deck = 0;
  }
  $deck0 = $deck; $deck = -1;

  if($bit & 2){
	$deck = 1;
  } 
  $deck1 = $deck; $deck = -1;

  if($bit & 4){
	$deck = 2;
  } 
  $deck2 = $deck; $deck = -1;

  if($bit & 8){
	$deck = 3;
  } 
  $deck3 = $deck; $deck = -1;

  if($bit & 16){
	$deck = 4;
  } 
  $deck4 = $deck; $deck = -1;

  if($bit & 32){
	$deck = 5;
  } 
  $deck5 = $deck; $deck = -1;

  if($bit & 64){
	$deck = 6; 
  } 
  $deck6 = $deck; $deck = -1;

  if($bit & 128){
	$deck = 7;
  } 
  $deck7 = $deck; $deck = -1;  
    

  $type = -1;

  if($objecttype & 1){
	$type = 0;
  }
  $type0 = $type; $type = -1;

  if($objecttype & 2){
	$type = 1;
  }
  $type1 = $type; $type = -1;

  if($objecttype & 4){
	$type = 2;
  }
  $type2 = $type; $type = -1;

  if($objecttype & 8){
	$type = 3;
  }
  $type3 = $type; $type = -1;

  if($objecttype & 16){
	$type = 4;
  }
  $type4 = $type; $type = -1;

  if($objecttype & 32){
	$type = 5;
  }
  $type5 = $type; $type = -1;
  
  if($type1 == 1){
  	$query = "SELECT count(*) AS count FROM games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
  	WHERE i.type = 1 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  	$result = $mysql->query_assoc($query);
  	$count = $result['count'];

	if(($charid != 36 && $count > 0) || ($charid == 36 && $count > 1) || ($charid == 24) || ($charid == 20)){
		$type1 = -1;
	}
  }
  
  if($type2 == 2){
	if($charid == 20){
		$type2 = -1;
	}
  }

  if($type5 == 5){
  	$query = "SELECT count(*) AS hcount FROM games_inventory gi
  	INNER JOIN inventory i ON i.id = gi.itemid
  	WHERE i.type = 5 AND gi.gameid = $gameid AND gi.playerid = $playerid AND gi.charid = $charid AND gi.lost = 0 AND gi.dropped = 0 AND gi.itemid > 0";
  	$result = $mysql->query_assoc($query);
  	$hcount = $result['hcount'];

	if($hcount > 0){
		$type5 = -1;
      }
  }

  $query = "SELECT id,name,type FROM inventory WHERE deck in($deck0,$deck1,$deck2,$deck3,$deck4,$deck5,$deck6,$deck7) AND type in ($type0,$type1,$type2,$type3,$type4,$type5) group by name";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
  	$items = array();
  	foreach ($result as $result) {

		$left = any_items_left($result['id']);
		if($left == 1)
		{
			array_push($items, $result['id']);
  		}
	}
  }
  $item = $items[rand(0, count($items) - 1)];

  if($item > 0 && $dquery == 0){
	$free = has_free_inventory_slot();
	if($free == 1){
		$query = "INSERT INTO games_inventory SET itemid = $item, gameid = $gameid, playerid = $playerid, charid = $charid, lost = 0, dropped = 0, inbag = 0";
   		$mysql->query_no_result($query);
	}
	elseif($free == 2){
		$query = "INSERT INTO games_inventory SET itemid = $item, gameid = $gameid, playerid = $playerid, charid = $charid, lost = 0, dropped = 0, inbag = 1";
   		$mysql->query_no_result($query);
	}
  }
  return $item;
	
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

function add_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $objectid = $_POST['objectid'];
  if($objectid == ''){
	$objectid = $_GET['objectid'];
  }

   $left = any_items_left($objectid);
   if($left == 1)
   {
   	$query = "INSERT INTO games_inventory SET itemid = $objectid, gameid = $gameid, playerid = $playerid, charid = $charid, lost = 0, dropped = 0, inbag = 0";
   	$mysql->query_no_result($query);
   }
}

function copy_inventory_to_bag() {
  global $mysql, $playerid, $gameid, $charid;

  $id = $_GET['id'];

   $query = "UPDATE games_inventory SET inbag = 1 WHERE id = $id";
   $mysql->query_no_result($query);

}

function copy_bag_to_inventory() {
  global $mysql, $playerid, $gameid, $charid;

  $id = $_GET['id'];

   $query = "UPDATE games_inventory SET inbag = 0 WHERE id = $id";
   $mysql->query_no_result($query);

}

function add_bag() {
  global $mysql, $playerid, $gameid, $charid;

  $objectid = $_POST['objectid'];
  if($objectid == ''){
	$objectid = $_GET['objectid'];
  }

   $left = any_items_left($objectid);
   if($left == 1)
   {
   	$query = "INSERT INTO games_inventory SET itemid = $objectid, gameid = $gameid, playerid = $playerid, charid = $charid, lost = 0, dropped = 0, inbag = 1";
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

   $query = "SELECT count(*) AS sbonus FROM games_inventory WHERE itemid = 16 AND gameid = $gameid AND playerid = $playerid AND charid = $charid AND dropped = 0 AND lost = 0";
   $result = $mysql->query_assoc($query);
   $sbonus = $result['sbonus']; 

   $splimit = 1;

   if($sbonus > 0){
	$splimit = $splimit+1;
   }

   if($craft == 3)
   {
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $playerid AND gs.charid = $charid AND gs.gameid = $gameid AND gs.discarded = 0 limit $splimit";
   }
   if($craft == 4 || $craft == 5)
   {
	$splimit = $splimit+1;
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $playerid AND gs.charid = $charid AND gs.gameid = $gameid AND gs.discarded = 0 limit $splimit";
   }
   if($craft > 5)
   {
	$splimit = $splimit+2;
	$query = "SELECT gs.spellid,s.name AS sname FROM games_spells gs
	INNER JOIN spells s ON s.id = gs.spellid
	WHERE gs.playerid = $playerid AND gs.charid = $charid AND gs.gameid = $gameid AND gs.discarded = 0 limit $splimit";
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

  $query = "SELECT count(*) AS sbonus FROM games_inventory WHERE itemid = 16 AND gameid = $gameid AND playerid = $playerid AND charid = $charid AND dropped = 0 AND lost = 0";
  $result = $mysql->query_assoc($query);
  $sbonus = $result['sbonus']; 

  if($sbonus > 0){
	if(($count < 2 && $craft > 2) || ($count < 3 && $craft > 3) || ($count < 4 && $craft > 5)){
  		$bool = 1;
  	}
  }
	
  else{
  	if(($count == 0 && $craft > 2) || ($count < 2 && $craft > 3) || ($count < 3 && $craft > 5)){
  		$bool = 1;
  	}
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

   $query = "SELECT id,name FROM spells order by rand()";
   $result = $mysql->query_mult_assoc($query);
   if ($result) {
	 $spells = array();
  	 foreach ($result as $result) {
		$left = any_spells_left($result['id']);
		if($left == 1)
		{
			array_push($spells, $result['id']);
  		}
    	 }
   }
   $spell = $spells[rand(0, count($spells) - 1)];

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

function get_spells($playerid, $gameid, $charid) {
   global $mysql;
	
   $used = all_spells_used();
   if($used == 1)
   {
      $query = "DELETE FROM games_spells WHERE discarded = 1";
      $mysql->query_no_result($query);
   }

   $query = "SELECT id,name FROM spells order by name";
   $result = $mysql->query_mult_assoc($query);
   if ($result) {
  	 foreach ($result as $result) {
		$left = any_spells_left($result['id']);
		if($left == 1)
		{
			$spells[] = array("id"=>$result['id'], "name"=>$result['name']);
  		}
    	 }
   }
    
  return $spells;
   
}

function insert_spell() {
  global $mysql, $playerid, $gameid, $charid;

  $spellid = $_POST['spellid'];

  $query = "INSERT INTO games_spells SET spellid = $spellid, gameid = $gameid, playerid = $playerid, charid = $charid";
  $mysql->query_no_result($query);
}

function load_rewards() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT gr.id,gr.rewardid,r.name,gr.complete from games_rewards gr 
  INNER JOIN rewards r ON r.id = gr.rewardid
  WHERE gr.gameid = $gameid AND gr.playerid = $playerid AND gr.charid = $charid AND gr.discarded = 0";
  $results = $mysql->query_mult_assoc($query);

  return $results;
}

function choose_random_reward() {
   global $mysql, $gameid, $playerid, $charid;

   $query = "SELECT id,name from rewards";
   $result = $mysql->query_mult_assoc($query);
   if ($result) {
	 $rewards = array();

  	 foreach ($result as $result) {
		$rid = $result['id'];
		$query = "SELECT count(*) as count from games_rewards WHERE rewardid = $rid AND gameid = $gameid";
	 	$result1 = $mysql->query_assoc($query);
        	$count = $result1['count'];

	 	if($count == 0){
			array_push($rewards, $result['id']);
		}
    	 }
   }
   $reward = $rewards[rand(0, count($rewards) - 1)];

   $query = "INSERT INTO games_rewards SET rewardid = $reward, gameid = $gameid, playerid = $playerid, charid = $charid";
   $mysql->query_no_result($query); 
}

function completed_quests() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) as count FROM games_quests where gameid = $gameid AND playerid = $playerid AND charid = $charid AND complete = 1";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}

function get_reward_count() {
  global $mysql, $playerid, $gameid, $charid;

  $query = "SELECT count(*) as count FROM games_rewards where gameid = $gameid AND playerid = $playerid AND charid = $charid AND discarded = 0";
  $result = $mysql->query_assoc($query);
  $count = $result['count'];

  return $count;
}

function discard_reward($value){
  global $mysql, $playerid, $gameid, $charid;
 
  $id = $_GET['id'];
  $rewardid = $_GET['rewardid'];

  if($value == 1){
  	$query = "UPDATE games_rewards SET discarded = 1 WHERE id = $id";
  	$mysql->query_no_result($query);
  }
  if($value == 2){
	$query = "UPDATE games_rewards SET complete = 1 WHERE id = $id";
  	$mysql->query_no_result($query);
  }

  if($rewardid == 5){
	$query = "UPDATE games_players set life = max_life WHERE playerid = $playerid AND gameid = $gameid AND charid = $charid";
	$mysql->query_no_result($query);
  }
  if($rewardid == 8){
	$query = "UPDATE games_players set life = life+1, max_life = max_life+1, gold = gold+1, fate = fate+1, max_fate = max_fate+1 WHERE playerid = $playerid AND gameid = $gameid AND charid = $charid";
	$mysql->query_no_result($query);

 	choose_random_spell($playerid, $gameid, $charid);
  }
  if($rewardid == 15){
	$query = "UPDATE games_players set fate = max_fate WHERE playerid = $playerid AND gameid = $gameid AND charid = $charid";
	$mysql->query_no_result($query);
  }
  if($rewardid == 16){
	$query = "UPDATE games_players set gold = gold+3 WHERE playerid = $playerid AND gameid = $gameid AND charid = $charid";
	$mysql->query_no_result($query);
  }
  if($rewardid == 22){
	draw_all_spells();
  }
}

?>