<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr> 	 	
<td width="75%" valign="top"> 
<br/>
</br/> 	
<?foreach($chardata as $cd): extract($cd);?>	
<?if($toad == 1) {?>
<img src="images/characters/toad.jpg" border="0" alt="Toad image" width="100%" height="38%"/>
<?} else {?>
<img src="images/characters/<?=$charid?>.jpg" border="0" alt="<?=$charid?> image" width="100%" height="38%"/>	
<?}?>
<?endforeach;?>
</td> 
<td width="25%" valign="top"> 		
<div style="height:auto;">  
<br/>
<br/> 	

<?foreach($bonuses as $bon): extract($bon);?>
<table style="border: 1px solid black; background-color: #CCC;">
      <tr><td align="left"><b>Vitals:</b></td></tr>
      <tr><td align="left">Life: <?=$life?>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=2"><img src="images/upgrade.gif" border="0" title="Life Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=3"><img src="images/downgrade.gif" border="0" title="Life Down"></a></td></tr>
      <?if($toad == 1) {?>
      <tr><td align="left">Strength: <?=$toad_strength?>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=4"><img src="images/upgrade.gif" border="0" title="Strength Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=5"><img src="images/downgrade.gif" border="0" title="Strength Down"></a><td></tr>
      <tr><td align="left">Craft: <?=$toad_craft?>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=6"><img src="images/upgrade.gif" border="0" title="Craft Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=7"><img src="images/downgrade.gif" border="0" title="Craft Down"></a></td></tr>
      <?} else {?>
      <tr><td align="left">Strength: <?=$strength?>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=8"><img src="images/upgrade.gif" border="0" title="Strength Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=9"><img src="images/downgrade.gif" border="0" title="Strength Down"></a></td></tr>
      <tr><td align="left">Craft: <?=$craft?>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=10"><img src="images/upgrade.gif" border="0" title="Craft Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=11"><img src="images/downgrade.gif" border="0" title="Craft Down"></a></td></tr>
      <?}?>
      <tr><td align="left">Gold: <?=$gold?>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=12"><img src="images/upgrade.gif" border="0" title="Gold Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=13"><img src="images/downgrade.gif" border="0" title="Gold Down"></a></td></tr>
      <tr><td align="left">Fate: <?=$fate?>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=14"><img src="images/upgrade.gif" border="0" title="Fate Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=15"><img src="images/downgrade.gif" border="0" title="Fate Down"></a><br/><br/></td></tr>

      <?if($toad == 0) { 
      if($charid == 33){
      $strbon = $strbon+1;}
      if($warbon == 1 || $charid == 20){
      $combat_str = $strength+$strbon+$craft; } 
      else {
      $combat_str = $strength+$strbon; }
      $combat_craft = $craft+$craftbon;?>
      
      <tr><td align="left"><b>Combat Strength:</b> <?=$combat_str?>&nbsp;&nbsp;</td></tr>
      <tr><td align="left"><b>Combat Craft:</b> <?=$combat_craft?>&nbsp;&nbsp;<br/><br/></td></tr>
      <?}?>

      <?if($charid == 6 || $charid == 15) {?>
      <tr><td align="left">Alignment: <b><?=$alignments[$alignment]?></b>&nbsp;&nbsp;</td></tr>
      <?} else {?>
      <tr><td align="left">Alignment: <a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=16"><b><?=$alignments[$alignment]?></b>&nbsp;&nbsp;</a></td></tr>
      <?}?>
      <?if($toad == 1) {?>
      <tr><td align="left">Movement: <?=$movements[3]?></td></tr>
      <?}?>
      <?if($toad == 0) { if($movement < $movebon) {?>
      <tr><td align="left">Movement: <?=$movements[$movebon]?></td></tr>
      <?} else {?>
      <tr><td align="left">Movement: <?=$movements[$movement]?></td></tr>
      <?}}?>
      <tr><td align="left">Start: <?=$start?></td></tr>
</table><br/>
<table style="border: 1px solid black; background-color: #CCC;">
      <tr><td align="left"><b>Options:</b></td></tr>
      <?if($toad == 1) {?>
      <tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=19"><b>Return me to normal</b>&nbsp;&nbsp;</a></td></tr>
      <?} else {?>
      <tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=18"><b>Toad Me</b>&nbsp;&nbsp;</a></td></tr>
      <?}?>
      <?if(($lost_gold > 0 && $toad == 0) || ($haslostitems == 1 && $toad == 0)) {?>
      <tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=20"><b>Recover All Lost Items</b>&nbsp;&nbsp;</a></td></tr>
      <?}?>
       <?if($hasdroppeditems == 1) {?>
      <tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=26"><b>Pickup Dropped Items</b>&nbsp;&nbsp;</a></td></tr>
      <?}?>
       <?if($invcount > 0){?>
      <tr><td align="left"><a onClick="return confirm('Are you sure you wish to drop all of your items?');"  href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=28"><b>Drop All Items</b>&nbsp;&nbsp;</a></td></tr>
	<?}?>
       <?if($charid == 8 && $hasspellslot == 1){?>
      <tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=31"><b>Draw Spells</b>&nbsp;&nbsp;</a></td></tr>
       <?}?>
</table><br/><br/>
<?endforeach;?>		
</div> 	
</td>
</tr>
</div>
</table>

<div>
<br/>
<br/> 	

<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>


<?//INVENTORY?>

<a href="#" onclick="toggle_visibility('inventory_block');"><b>Inventory</b><br/><br/></a>
<div id="inventory_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($inventorydata as $invd): extract($invd);?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($invcount < 4) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 4) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 3 && $invcount > 3 && $invcount < 8) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 8) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 12){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 7 && $invcount > 7 && $invcount < 12) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 12) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 16){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 11 && $invcount > 11 && $invcount < 16) {?>
	<td>

	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&int=<?=$objectbon+4?>&int_=<?=$invcount?>&action=22"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 16) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 15 && $invcount > 15 && $invcount < 20) {?>
	<td>

	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&int=<?=$objectbon+4?>&int_=<?=$invcount?>&action=22"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
<?endforeach;?>
</tr>
</div>
</table>
<br/><br/>

</div>
    </center>

<?//FOLLOWERS?>

<a href="#" onclick="toggle_visibility('followers_block');"><b>Followers</b><br/><br/></a>
<div id="followers_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($followers as $fol): extract($fol);?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 4) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 4 && $i < 9) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 8 && $folcount > 3) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 8 && $i < 13) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 12){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 12 && $folcount > 7) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 12 && $i < 17) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 16){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 16 && $folcount > 11) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 16 && $i < 21) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td>
<?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 20 && $folcount > 15) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/new.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>
<br/><br/>

</center>
</div>


<?//SPELLS?>
<?if($craft > 2){?>
<a href="#" onclick="toggle_visibility('spells_block');"><b>Spells</b><br/><br/></a>
<div id="spells_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($spells as $spell): extract($spell);?>
<?if($i < 4) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to cast/discard Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&action=29"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 3){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($hasspellslot == 1) {?>
<td>
<div class="topimg"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=30"><img width=175 src="images/spells/random.jpg" alt="New Image"/></a></div>
<div class="botimg"><a onClick="return confirm('Choosing your own spell is not a typical play. Are you sure you wish to do this?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=x"><img width=175 src="images/spells/choose.jpg" alt="New Image"/></a></div>
</td>
<?}?>
</tr>
</div>
</table>
<br/><br/>

    </center>
  </div>
<?}?>

<?//DISCRDED SPELLS?>
<?if($craft > 2 && $charid == 13 && $hasspellslot == 1){?>
<a href="#" onclick="toggle_visibility('dspells_block');"><b>Discarded Spells</b><br/><br/></a>
<div id="dspells_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($dspells as $dspell): extract($dspell);?>
<?if($i < 5) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to claim Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&action=32"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($dspells as $dspell): extract($dspell);?>
<?if($i > 4 && $i < 9) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to claim Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&action=32"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($dspells as $dspell): extract($dspell);?>
<?if($i > 8 && $i < 13) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to claim Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&action=32"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 12){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($dspells as $dspell): extract($dspell);?>
<?if($i > 12 && $i < 17) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to claim Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&action=32"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 16){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($dspells as $dspell): extract($dspell);?>
<?if($i > 16 && $i < 21) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to claim Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&action=32"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>
<br/><br/>

    </center>
  </div>
<?}?>

<?//NEXT SPELL?>
<?if($charid == 27){?>
<a href="#" onclick="toggle_visibility('nspells_block');"><b>Next Spell</b><br/><br/></a>
<div id="nspells_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
      <td>
     <img width=175 src="images/spells/<?=$nextspellid?>.jpg" alt="<?=$nextspellid?> Image"/></td>
</tr>
</div>
</table>
<br/><br/>

    </center>
  </div>
<?}?>

</div>
