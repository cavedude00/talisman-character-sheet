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
<?foreach($rbonuses as $rbon): extract($rbon);?>
<table style="border: 1px solid black; background-color: #CCC;">
      <tr><td align="left"><b>Vitals:</b></td></tr>
      <? $totallife = $rlifebon+$max_life;
      $totalfate = $rfatebon+$max_fate;?>
      <tr><td align="left">Life: <b><?=$life?> (<?=$totallife?>)</b>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=40"><img src="images/heart.gif" border="0" title="Heal"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=3"><img src="images/downgrade.gif" border="0" title="Life Down"></a>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=2"><img src="images/upgrade.gif" border="0" title="Life Up"></a></td></tr>
      <?if($toad == 1) {?>
      <tr><td align="left">Strength: <b><?=$toad_strength?></b>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=4"><img src="images/upgrade.gif" border="0" title="Strength Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=5"><img src="images/downgrade.gif" border="0" title="Strength Down"></a><td></tr>
      <tr><td align="left">Craft: <b><?=$toad_craft?></b>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=6"><img src="images/upgrade.gif" border="0" title="Craft Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=7"><img src="images/downgrade.gif" border="0" title="Craft Down"></a></td></tr>
      <?} else {
	$totalstr = $strength+$pstrbon+$rstrbon;
	$totalcraft = $craft+$pcraftbon+$rcraftbon;?>
      <tr><td align="left">Strength: <b><?=$totalstr?></b>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=8"><img src="images/upgrade.gif" border="0" title="Strength Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=9"><img src="images/downgrade.gif" border="0" title="Strength Down"></a></td></tr>
      <tr><td align="left">Craft: <b><?=$totalcraft?></b>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=10"><img src="images/upgrade.gif" border="0" title="Craft Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=11"><img src="images/downgrade.gif" border="0" title="Craft Down"></a></td></tr>
      <?}?>
      <tr><td align="left">Gold: <b><?=$gold?></b>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=12"><img src="images/upgrade.gif" border="0" title="Gold Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=13"><img src="images/downgrade.gif" border="0" title="Gold Down"></a></td></tr>
      <tr><td align="left">Fate: <b><?=$fate?> (<?=$totalfate?>)</b>&nbsp;&nbsp;<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=14"><img src="images/upgrade.gif" border="0" title="Fate Up"></a><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=15"><img src="images/downgrade.gif" border="0" title="Fate Down"></a><br/><br/></td></tr>

      <?if($toad == 0) { 
      if($charid == 33){
      $strbon = $strbon+1;}
      if($warbon == 1 || $charid == 20){
      $combat_str = $totalstr+$strbon+$totalcraft; } 
      else {
      $combat_str = $totalstr+$strbon; }
      $combat_craft = $totalcraft+$craftbon;?>
      
      <tr><td align="left"><b>Combat Strength: <?=$combat_str?></b> &nbsp;&nbsp;</td></tr>
      <tr><td align="left"><b>Combat Craft: <?=$combat_craft?></b> &nbsp;&nbsp;<br/><br/></td></tr>
      <?}?>

      <?if($toad == 1) {?>
      <tr><td align="left">Movement: <b><?=$movements[4]?></b></td></tr>
      <?}?>
      <?if($toad == 0) { if($movement < $movebon) {?>
      <tr><td align="left">Movement: <b><?=$movements[$movebon]?></b></td></tr>
      <?} else {?>
      <tr><td align="left">Movement: <b><?=$movements[$movement]?></b></td></tr>
      <?}}?>
      <tr><td align="left">Start: <b><?=$start?></b></td></tr>
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
       <?if($hasdroppeditems == 1 && $inventoryfree > 0) {?>
      <tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=26"><b>Pickup Dropped Items</b>&nbsp;&nbsp;</a></td></tr>
      <?}?>
       <?if($invcount > 0){?>
      <tr><td align="left"><a onClick="return confirm('Are you sure you wish to drop all of your items?');"  href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=28"><b>Drop All Items</b>&nbsp;&nbsp;</a></td></tr>
	<?}?>
       <?if($charid == 8 && $hasspellslot == 1){?>
      <tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=31"><b>Draw Spells</b>&nbsp;&nbsp;</a></td></tr>
       <?}?>
       <?if($inventoryfree > 0 && $relic > 0) {?>
	<tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=36"><b>Draw Random Relic</b>&nbsp;&nbsp;</a></td></tr>
	<?}?>
	 <?if($inventoryfree > 0 && $treasure > 0) {?>
	<tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=37"><b>Draw Treasure</b>&nbsp;&nbsp;</a></td></tr>
	<?}?>
	<?if($inventoryfree == 0){?>
	<tr><td align="left"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=50"><b>Draw an Over-The-Limit Item</b>&nbsp;&nbsp;</a></td></tr>
	<?}?>
</table><br/><br/>
<?endforeach;?>
<?endforeach;?>
<?if($charid == 6 || $charid == 15) {?>	
<img width=175 src="images/alignment/<?=$alignment?>.jpg" alt="New Image"/>
<?} else {?>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=16"><img width=175 src="images/alignment/<?=$alignment?>.jpg" alt="New Image"/></a>
<?}?>
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
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($invcount < 4) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
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
      <div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>	
      <? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 4 && $invcount > 3 && $invcount < 8 && $inventoryfree & 1) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
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
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 12){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 8 && $invcount > 7 && $invcount < 12 && $inventoryfree & 1) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
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
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 16){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 12 && $invcount > 11 && $invcount < 16 && $inventoryfree & 1) {?>
	<td>

	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
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
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div>
<?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 16 && $invcount > 15 && $invcount < 20 && $inventoryfree & 1) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
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
<?if($i > 20) {?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div>
<?}?>
<?if($i == 24){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 20 && $invcount > 19 && $invcount < 24 && $inventoryfree & 1) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
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
<?if($i > 24) {?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div>
<?}?>
<?if($i == 28){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 24 && $invcount > 23 && $invcount < 28 && $inventoryfree & 1) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
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
<?if($i > 28) {?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 2 && $bag == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your bag?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=44"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div>
<?}?>
<?if($i == 32){ break; }?>
<?$i++;?>
<?endforeach;?>

<?foreach($bonuses as $bon): extract($bon);?>	
<?if($objectbon+4 > 28 && $invcount > 27 && $invcount < 32 && $inventoryfree & 1) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=22"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
<?}?>
<?endforeach;?>
</tr>
</div>
</table>

<br/><br/>

</div>
    </center>

<? if($has_bag > 0){?>
<?//BAG INVENTORY?>

<a href="#" onclick="toggle_visibility('bags_block');"><b>Bags</b><br/><br/></a>
<div id="bags_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($bagdata as $bag): extract($bag);?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 1 && $ignorelimit == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your inventory?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=45"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
	
<?if($bagcount < 4 && $inventoryfree & 2) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=38"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($bagdata as $bag): extract($bag);?>
<?if($i > 4) {?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 1 && $ignorelimit == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your inventory?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=45"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>

<?if($bagcount > 3 && $bagcount < 8 && $inventoryfree & 2) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=38"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>
<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($bagdata as $bag): extract($bag);?>
<?if($i > 8) {?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 1 && $ignorelimit == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your inventory?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=45"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 12){ break; }?>
<?$i++;?>
<?endforeach;?>

<?if($bagcount > 7 && $bagcount < 12 && $inventoryfree & 2) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=38"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($bagdata as $bag): extract($bag);?>
<?if($i > 12) {?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 1 && $ignorelimit == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your inventory?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=45"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 16){ break; }?>
<?$i++;?>
<?endforeach;?>

<?if($bagcount > 11 && $bagcount < 16 && $inventoryfree & 2) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=38"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($bagdata as $bag): extract($bag);?>
<?if($i > 16) {?>
      <td>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&itemid=<?=$itemid?>&action=43"><img src="images/delete.gif"/></a>
	<? if($has_bag > 0 && $inventoryfree & 1 && $ignorelimit == 0){?>
	<a onClick="return confirm('Are you sure you wish to move your <?=$name?> to your inventory?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=45"><img src="images/bag.jpg"/></a>
	<?}?>
	<?if($followerid > 0){?>
	Follower Owned
	<?}?>
	</div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
<?endforeach;?>

<?if($bagcount > 15 && $bagcount < 20 && $inventoryfree & 2) {?>
	<td>
	<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=38"><img width=175 src="images/inventory/draw.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>
<br/><br/>

</div>
    </center>
<?}?>

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
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=43"><img src="images/delete.gif"/></a></div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 4) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/drawf.jpg" alt="New Image"/></a></td>
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
<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=43"><img src="images/delete.gif"/></a></div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 8 && $folcount > 3) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/drawf.jpg" alt="New Image"/></a></td>
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
<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=43"><img src="images/delete.gif"/></a></div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 12){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 12 && $folcount > 7) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/drawf.jpg" alt="New Image"/></a></td>
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
<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=43"><img src="images/delete.gif"/></a></div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 16){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 16 && $folcount > 11) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/drawf.jpg" alt="New Image"/></a></td>
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
<div class="topimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=43"><img src="images/delete.gif"/></a></div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to drop your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&action=21"><img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></a></td></div><?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($folcount < 20 && $folcount > 15) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=24"><img width=175 src="images/inventory/drawf.jpg" alt="New Image"/></a></td>
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
<?if($i < 5) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to cast/discard Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&action=29"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($hasspellslot == 1) {?>
<td>
<div class="topimg"><a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=30"><img width=175 src="images/spells/random.jpg" alt="New Image"/></a></div>
<div class="botimg"><a onClick="return confirm('Choosing your own spell is not a typical play. Are you sure you wish to do this?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=41"><img width=175 src="images/spells/draw.jpg" alt="New Image"/></a></div>
</td>
<?}?>
</tr>
</div>
</table>
<br/><br/>

    </center>
  </div>
<?}?>

<?//FOLLOWER SPELLS?>
<?if($fspells > 0){?>
<a href="#" onclick="toggle_visibility('fspells_block');"><b>Follower Spells</b><br/><br/></a>
<div id="fspells_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($fspells as $fspell): extract($fspell);?>
<?if($i < 5) {?>
      <td>
	<a onClick="return confirm('Are you sure you wish to cast/discard Spell:<?=$sname?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&spellid=<?=$spellid?>&follower=<?=$isfollower?>&action=29"><img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></a></td>
<?}?>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
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

<?//REWARDS?>
<?foreach($gamedata as $gamed): extract($gamed);?>
<?if($quest_rewards == 1) { if(($completequests > 0 && $ending != 2) || ($completequests > 3)){ ?>

<a href="#" onclick="toggle_visibility('rewards_block');"><b>Quest Rewards</b><br/><br/></a>
<div id="rewards_block" style="display:none">
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($rewards as $reward): extract($reward);?>
      <td>
	<?if($complete == 1) {?>
	<br/><br/>
	<img width=175 src="images/rewards/back.jpg" alt="Image"/>
	<?} else {?>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to flip your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&rewardid=<?=$rewardid?>&value=2&action=47"><img src="images/approved.gif"/></div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&rewardid=<?=$rewardid?>&value=1&action=47"><img width=175 src="images/rewards/<?=$rewardid?>.jpg" alt="<?=$rewardid?> Image"/></a></td></div>
	<?}?>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($rewardcount < 4) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=46"><img width=175 src="images/rewards/random.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($rewards as $rew): extract($rew);?>
<?if($i > 4 && $i < 9) {?>
      <td>
	<?if($complete == 1) {?>
	<br/><br/>
	<img width=175 src="images/rewards/back.jpg" alt="Image"/>
	<?} else {?>
	<div class="topimg"><a onClick="return confirm('Are you sure you wish to flip your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&rewardid=<?=$rewardid?>&value=2&action=47"><img src="images/approved.gif"/></div>
	<div class="botimg"><a onClick="return confirm('Are you sure you wish to discard your <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$id?>&rewardid=<?=$rewardid?>&value=1&action=47"><img width=175 src="images/rewards/<?=$rewardid?>.jpg" alt="<?=$rewardid?> Image"/></a></td></div>
	<?}}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>
<?if($rewardcount < 8 && $rewardcount > 3) {?>
<td>
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=46"><img width=175 src="images/rewards/random.jpg" alt="New Image"/></a></td>
<?}?>
</tr>
</div>
</table>

</center>
</div>
<?}}?>
<?endforeach;?>

</div>
