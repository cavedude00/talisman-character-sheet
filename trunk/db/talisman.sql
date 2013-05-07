/*
MySQL Data Transfer
Source Host: 192.168.1.92
Source Database: talisman
Target Host: 192.168.1.92
Target Database: talisman
Date: 5/7/2013 11:37:15 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for characters
-- ----------------------------
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `strength` smallint(6) NOT NULL DEFAULT '0',
  `craft` smallint(6) NOT NULL DEFAULT '0',
  `fate` smallint(6) NOT NULL DEFAULT '0',
  `life` smallint(6) NOT NULL DEFAULT '0',
  `start` char(255) DEFAULT NULL,
  `alignment` tinyint(4) NOT NULL DEFAULT '0',
  `gold` smallint(6) NOT NULL DEFAULT '1',
  `movement` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for endings
-- ----------------------------
CREATE TABLE `endings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `revealed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for games
-- ----------------------------
CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `nextspellid` mediumint(9) NOT NULL DEFAULT '0',
  `ending` tinyint(4) NOT NULL DEFAULT '0',
  `reaper` tinyint(4) NOT NULL DEFAULT '0',
  `revealed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for games_inventory
-- ----------------------------
CREATE TABLE `games_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL DEFAULT '0',
  `playerid` int(11) NOT NULL DEFAULT '0',
  `gameid` int(11) NOT NULL DEFAULT '0',
  `charid` int(11) NOT NULL DEFAULT '0',
  `lost` tinyint(4) NOT NULL DEFAULT '0',
  `dropped` tinyint(4) NOT NULL DEFAULT '0',
  `spellid` int(11) NOT NULL DEFAULT '0',
  `spell_discarded` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for games_players
-- ----------------------------
CREATE TABLE `games_players` (
  `gameid` int(11) NOT NULL DEFAULT '0',
  `playerid` int(11) NOT NULL DEFAULT '0',
  `charid` int(11) NOT NULL DEFAULT '0',
  `strength` int(11) NOT NULL DEFAULT '0',
  `craft` int(11) NOT NULL DEFAULT '0',
  `fate` int(11) NOT NULL DEFAULT '0',
  `life` int(11) NOT NULL DEFAULT '0',
  `alignment` tinyint(4) NOT NULL DEFAULT '0',
  `gold` int(11) NOT NULL DEFAULT '1',
  `toad` tinyint(4) NOT NULL DEFAULT '0',
  `toad_strength` int(11) NOT NULL DEFAULT '1',
  `toad_craft` int(11) NOT NULL DEFAULT '1',
  `movement` int(11) NOT NULL DEFAULT '0',
  `lost_gold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gameid`,`playerid`,`charid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for games_spells
-- ----------------------------
CREATE TABLE `games_spells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spellid` int(11) NOT NULL DEFAULT '0',
  `discarded` tinyint(4) NOT NULL DEFAULT '0',
  `playerid` mediumint(9) NOT NULL DEFAULT '0',
  `gameid` mediumint(9) NOT NULL DEFAULT '0',
  `charid` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for inventory
-- ----------------------------
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `type` mediumint(9) NOT NULL DEFAULT '0',
  `strength` smallint(6) NOT NULL DEFAULT '0',
  `craft` smallint(6) NOT NULL DEFAULT '0',
  `object` smallint(6) NOT NULL DEFAULT '0',
  `movement` smallint(6) NOT NULL DEFAULT '0',
  `talisman` smallint(6) NOT NULL DEFAULT '0',
  `warhorse` smallint(6) NOT NULL DEFAULT '0',
  `qty` mediumint(9) NOT NULL DEFAULT '0',
  `relic` tinyint(4) NOT NULL DEFAULT '0',
  `treasure` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for players
-- ----------------------------
CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `password` char(255) DEFAULT NULL,
  `wins` int(11) NOT NULL DEFAULT '0',
  `losses` int(11) NOT NULL DEFAULT '0',
  `ties` int(11) NOT NULL DEFAULT '0',
  `administrator` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for spells
-- ----------------------------
CREATE TABLE `spells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `qty` mediumint(9) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `characters` VALUES ('1', 'Alchemist', '2', '4', '3', '4', 'City', '0', '5', '0');
INSERT INTO `characters` VALUES ('2', 'Amazon', '3', '3', '3', '4', 'Village', '0', '1', '1');
INSERT INTO `characters` VALUES ('3', 'Assassin', '3', '3', '3', '4', 'City', '2', '1', '0');
INSERT INTO `characters` VALUES ('4', 'Chivalric Knight', '3', '3', '2', '4', 'Castle', '1', '1', '0');
INSERT INTO `characters` VALUES ('5', 'Cleric', '3', '4', '3', '3', 'Chapel', '1', '1', '0');
INSERT INTO `characters` VALUES ('6', 'Dark Cultist', '3', '3', '1', '4', 'Graveyard', '2', '1', '0');
INSERT INTO `characters` VALUES ('7', 'Dread Knight', '2', '3', '1', '4', 'Graveyard', '2', '1', '0');
INSERT INTO `characters` VALUES ('8', 'Druid', '2', '4', '4', '4', 'Forest', '0', '1', '0');
INSERT INTO `characters` VALUES ('9', 'Dwarf', '3', '3', '5', '5', 'Crags', '0', '1', '0');
INSERT INTO `characters` VALUES ('10', 'Elf', '3', '4', '3', '4', 'Forest', '1', '1', '0');
INSERT INTO `characters` VALUES ('11', 'Ghoul', '2', '4', '4', '4', 'Graveyard', '2', '1', '0');
INSERT INTO `characters` VALUES ('12', 'Gladiator', '4', '2', '1', '5', 'Tavern', '2', '1', '0');
INSERT INTO `characters` VALUES ('13', 'Gypsy', '2', '4', '4', '4', 'Forest', '1', '1', '0');
INSERT INTO `characters` VALUES ('14', 'Highlander', '4', '2', '2', '4', 'Crags', '0', '1', '0');
INSERT INTO `characters` VALUES ('15', 'Knight', '4', '3', '1', '4', 'Chapel', '1', '1', '0');
INSERT INTO `characters` VALUES ('16', 'Leprechaun', '2', '4', '3', '4', 'Forest', '0', '1', '0');
INSERT INTO `characters` VALUES ('17', 'Magus', '2', '4', '1', '4', 'City', '2', '1', '0');
INSERT INTO `characters` VALUES ('18', 'Merchant', '2', '4', '4', '4', 'City', '0', '5', '0');
INSERT INTO `characters` VALUES ('19', 'Minstrel', '2', '4', '5', '4', 'Tavern', '1', '1', '0');
INSERT INTO `characters` VALUES ('20', 'Monk', '2', '3', '5', '4', 'Village', '1', '1', '0');
INSERT INTO `characters` VALUES ('21', 'Necromancer', '2', '4', '2', '4', 'Graveyard', '2', '1', '0');
INSERT INTO `characters` VALUES ('22', 'Ogre Chieftain', '5', '2', '1', '6', 'Crags', '0', '1', '0');
INSERT INTO `characters` VALUES ('23', 'Philosopher', '2', '4', '2', '4', 'City', '0', '1', '0');
INSERT INTO `characters` VALUES ('24', 'Priest', '2', '4', '5', '4', 'Chapel', '1', '1', '0');
INSERT INTO `characters` VALUES ('25', 'Prophetess', '2', '4', '2', '4', 'Chapel', '1', '1', '0');
INSERT INTO `characters` VALUES ('26', 'Rogue', '3', '3', '4', '4', 'Tavern', '0', '1', '0');
INSERT INTO `characters` VALUES ('27', 'Sage', '2', '4', '3', '4', 'Village', '0', '1', '0');
INSERT INTO `characters` VALUES ('28', 'Sorceress', '2', '4', '3', '4', 'Graveyard', '2', '1', '0');
INSERT INTO `characters` VALUES ('29', 'Sprite', '1', '5', '1', '4', 'Forest', '1', '1', '0');
INSERT INTO `characters` VALUES ('30', 'Swashbuckler', '3', '3', '2', '4', 'Tavern', '1', '1', '0');
INSERT INTO `characters` VALUES ('31', 'Thief', '3', '3', '2', '4', 'City', '0', '1', '0');
INSERT INTO `characters` VALUES ('32', 'Troll', '6', '1', '1', '6', 'Crags', '0', '1', '0');
INSERT INTO `characters` VALUES ('33', 'Valkyrie', '3', '4', '3', '4', 'Ruins', '1', '1', '0');
INSERT INTO `characters` VALUES ('34', 'Vampiress', '3', '3', '3', '5', 'Graveyard', '2', '1', '0');
INSERT INTO `characters` VALUES ('35', 'Warlock', '2', '5', '1', '4', 'Warlock\'s Cave', '0', '1', '0');
INSERT INTO `characters` VALUES ('36', 'Warrior', '4', '2', '1', '5', 'Tavern', '0', '1', '0');
INSERT INTO `characters` VALUES ('37', 'Wizard', '2', '5', '3', '4', 'Graveyard', '2', '1', '0');
INSERT INTO `endings` VALUES ('1', 'Sacred Pool', '1');
INSERT INTO `endings` VALUES ('2', 'Warlock Quests', '1');
INSERT INTO `endings` VALUES ('3', 'Eagle King', '0');
INSERT INTO `endings` VALUES ('4', 'Crown and Sceptre', '0');
INSERT INTO `endings` VALUES ('5', 'Judgement Day', '0');
INSERT INTO `endings` VALUES ('6', 'Demon Lord', '0');
INSERT INTO `endings` VALUES ('7', 'Battle Royale', '0');
INSERT INTO `endings` VALUES ('8', 'Ice Queen', '0');
INSERT INTO `endings` VALUES ('9', 'Hand of Doom', '0');
INSERT INTO `endings` VALUES ('10', 'Crown of Command', '0');
INSERT INTO `endings` VALUES ('11', 'Danse Macabre', '0');
INSERT INTO `inventory` VALUES ('1', 'Axe', '1', '1', '0', '0', '0', '0', '0', '4', '0', '0');
INSERT INTO `inventory` VALUES ('2', 'Armour', '2', '0', '0', '0', '0', '0', '0', '4', '0', '0');
INSERT INTO `inventory` VALUES ('3', 'Mule', '3', '0', '0', '4', '0', '0', '0', '6', '0', '0');
INSERT INTO `inventory` VALUES ('4', 'Water Bottle', '0', '0', '0', '0', '0', '0', '0', '4', '0', '0');
INSERT INTO `inventory` VALUES ('5', 'Shield', '2', '0', '0', '0', '0', '0', '0', '4', '0', '0');
INSERT INTO `inventory` VALUES ('6', 'Sword', '1', '1', '0', '0', '0', '0', '0', '3', '0', '0');
INSERT INTO `inventory` VALUES ('7', 'Helmet', '2', '0', '0', '0', '0', '0', '0', '4', '0', '0');
INSERT INTO `inventory` VALUES ('8', 'Raft', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO `inventory` VALUES ('9', 'Horse and Cart', '5', '0', '0', '8', '0', '0', '0', '3', '0', '0');
INSERT INTO `inventory` VALUES ('10', 'Warhorse', '5', '0', '0', '0', '0', '0', '1', '3', '0', '0');
INSERT INTO `inventory` VALUES ('11', 'Riding Horse', '5', '0', '0', '0', '2', '0', '0', '3', '0', '0');
INSERT INTO `inventory` VALUES ('12', 'Talisman', '4', '0', '0', '0', '0', '1', '0', '4', '0', '0');
INSERT INTO `spells` VALUES ('1', 'Mind Steal', '2');
INSERT INTO `spells` VALUES ('2', 'Misfortune', '2');
INSERT INTO `spells` VALUES ('3', 'Feeble Mind', '1');
INSERT INTO `spells` VALUES ('4', 'Restoration', '2');
INSERT INTO `spells` VALUES ('5', 'Cloak of Shadows', '1');
INSERT INTO `spells` VALUES ('6', 'Lightning Bolt', '2');
INSERT INTO `spells` VALUES ('7', 'Black Ice', '1');
INSERT INTO `spells` VALUES ('8', 'Soul Shatter', '2');
INSERT INTO `spells` VALUES ('9', 'Finger of Death', '1');
INSERT INTO `spells` VALUES ('10', 'Craft', '2');
INSERT INTO `spells` VALUES ('11', 'Obliterate', '1');
INSERT INTO `spells` VALUES ('12', 'Immobility', '2');
INSERT INTO `spells` VALUES ('13', 'Slow Motion', '1');
INSERT INTO `spells` VALUES ('14', 'Displacement', '2');
INSERT INTO `spells` VALUES ('15', 'Strength', '2');
INSERT INTO `spells` VALUES ('16', 'Invisbility', '1');
INSERT INTO `spells` VALUES ('17', 'Barrier', '1');
INSERT INTO `spells` VALUES ('18', 'Gust of Wind', '1');
INSERT INTO `spells` VALUES ('19', 'Spell Call', '2');
INSERT INTO `spells` VALUES ('20', 'Marked for Glory', '1');
INSERT INTO `spells` VALUES ('21', 'Sleep', '1');
INSERT INTO `spells` VALUES ('22', 'Syphon Strength', '1');
INSERT INTO `spells` VALUES ('23', 'Temporal Warp', '1');
INSERT INTO `spells` VALUES ('24', 'Dominate', '1');
INSERT INTO `spells` VALUES ('25', 'Transference', '1');
INSERT INTO `spells` VALUES ('26', 'Reverence', '1');
INSERT INTO `spells` VALUES ('27', 'Shatter', '1');
INSERT INTO `spells` VALUES ('28', 'Enrich', '1');
INSERT INTO `spells` VALUES ('29', 'Healing', '2');
INSERT INTO `spells` VALUES ('30', 'Destruction', '2');
INSERT INTO `spells` VALUES ('31', 'Enchant Blade', '1');
INSERT INTO `spells` VALUES ('32', 'Time Steal', '2');
INSERT INTO `spells` VALUES ('33', 'Energize', '2');
INSERT INTO `spells` VALUES ('34', 'Divine Intervention', '2');
INSERT INTO `spells` VALUES ('35', 'Simulacrum', '2');
INSERT INTO `spells` VALUES ('36', 'Preservation', '1');
INSERT INTO `spells` VALUES ('37', 'Vindication', '1');
INSERT INTO `spells` VALUES ('38', 'Transmute', '1');
INSERT INTO `spells` VALUES ('39', 'Path of Destiny', '2');
INSERT INTO `spells` VALUES ('40', 'Brainwave', '2');
INSERT INTO `spells` VALUES ('41', 'Freeze', '1');
INSERT INTO `spells` VALUES ('42', 'Misdirection', '1');
INSERT INTO `spells` VALUES ('43', 'Nullify', '1');
INSERT INTO `spells` VALUES ('44', 'Destroy Magic', '1');
INSERT INTO `spells` VALUES ('45', 'Displacment', '1');
INSERT INTO `spells` VALUES ('46', 'Water Walking', '1');
INSERT INTO `spells` VALUES ('47', 'Alteration', '1');
INSERT INTO `spells` VALUES ('48', 'Summon Storm', '1');
INSERT INTO `spells` VALUES ('49', 'Summon Scarecrow', '1');
INSERT INTO `spells` VALUES ('50', 'Summon Bear', '1');
INSERT INTO `spells` VALUES ('51', 'Magic Portal', '2');
INSERT INTO `spells` VALUES ('52', 'Random', '2');
INSERT INTO `spells` VALUES ('53', 'Retribution', '1');
INSERT INTO `spells` VALUES ('56', 'Life Tap', '1');
INSERT INTO `spells` VALUES ('55', 'Cheat Fate', '1');
INSERT INTO `spells` VALUES ('54', 'Generosity', '1');
INSERT INTO `spells` VALUES ('57', 'Temporal Vortex', '1');
INSERT INTO `spells` VALUES ('58', 'Speed', '1');
INSERT INTO `spells` VALUES ('59', 'Resurrection', '1');
INSERT INTO `spells` VALUES ('60', 'Invoke Favour', '2');
INSERT INTO `spells` VALUES ('61', 'Temporary Change', '2');
INSERT INTO `spells` VALUES ('62', 'Stasis', '2');
INSERT INTO `spells` VALUES ('63', 'Weakness', '2');
INSERT INTO `spells` VALUES ('64', 'Mesmerism', '1');
INSERT INTO `spells` VALUES ('65', 'Eyes of the Hawk', '2');
INSERT INTO `spells` VALUES ('66', 'Summon Phoenix', '1');
INSERT INTO `spells` VALUES ('68', 'Todify!', '2');
INSERT INTO `spells` VALUES ('69', 'Summon Serpent', '1');
INSERT INTO `spells` VALUES ('67', 'Bladesharp', '1');
INSERT INTO `spells` VALUES ('70', 'Acquisition', '1');
INSERT INTO `spells` VALUES ('71', 'Metamorph', '1');
INSERT INTO `spells` VALUES ('72', 'Magic Shell', '1');
INSERT INTO `spells` VALUES ('73', 'Blessed', '1');
INSERT INTO `spells` VALUES ('74', 'Psionic Blast', '2');
INSERT INTO `spells` VALUES ('75', 'Reflection', '1');
INSERT INTO `spells` VALUES ('76', 'Hex', '1');
INSERT INTO `spells` VALUES ('77', 'Hydra Spell', '1');
INSERT INTO `spells` VALUES ('79', 'Twist of Fate', '2');
INSERT INTO `spells` VALUES ('78', 'Vortex', '1');
INSERT INTO `spells` VALUES ('80', 'Teleport', '2');
INSERT INTO `spells` VALUES ('81', 'Bolster', '2');
INSERT INTO `spells` VALUES ('82', 'Divination', '1');
INSERT INTO `spells` VALUES ('83', 'Counterspell', '2');
INSERT INTO `spells` VALUES ('84', 'Fireball', '1');
INSERT INTO `spells` VALUES ('85', 'Mini-Vortex', '1');
INSERT INTO `spells` VALUES ('86', 'Alchemy', '1');
