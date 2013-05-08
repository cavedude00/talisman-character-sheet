<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr> 	 	
<td width="75%" valign="top"> 
<?foreach($stats as $stat): extract($stat);?>	
<div class='tab_title'><?=$name?> (<?=$wins?>-<?=$losses?>-<?=$ties?>)</div>
<?endforeach;?>
<br/>	
<?foreach($opponents as $opp): extract($opp);?>	
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

<table style="border: 1px solid black; background-color: #CCC;">
      <tr><td align="left"><b>Vitals:</b></td></tr>
      <tr><td align="left">Life: <?=$life?></td></tr>
      <?if($toad == 1) {?>
      <tr><td align="left">Strength: <?=$toad_strength?><td></tr>
      <tr><td align="left">Craft: <?=$toad_craft?></td></tr>
      <?} else {?>
      <tr><td align="left">Strength: <?=$strength?></a></td></tr>
      <tr><td align="left">Craft: <?=$craft?></td></tr>
      <?}?>
      <tr><td align="left">Gold: <?=$gold?></td></tr>
      <tr><td align="left">Fate: <?=$fate?><br/><br/></td></tr>

      <?if($toad == 1) {?>
      <tr><td align="left">Movement: <?=$movements[4]?></td></tr>
      <?}?>
      <?if($toad == 0) { if($movement < $movebon) {?>
      <tr><td align="left">Movement: <?=$movements[$movebon]?></td></tr>
      <?} else {?>
      <tr><td align="left">Movement: <?=$movements[$movement]?></td></tr>
      <?}}?>
      <tr><td align="left">Start: <?=$start?></td></tr>
</table><br/>	
<?if($multopps == 1) {?>
<table style="border: 1px solid black; background-color: #CCC;">
      <tr><td align="left"><b>Options:</b></td></tr>
      <tr><td align="left"><a href="index.php?editor=opponents&gameid=<?=$gameid?>&charid=<?=$mycharid?>&action=2"><b>Switch Opponent</b>&nbsp;&nbsp;</a></td></tr>
</table><br/><br/>	
<?}?>
<img width=175 src="images/alignment/<?=$alignment?>.jpg" alt="New Image"/>
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
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 4) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 8) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 12) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($inventorydata as $invd): extract($invd);?>
<?if($i > 16) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
<?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
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
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 4 && $i < 9) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 8 && $i < 13) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 12 && $i < 17) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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
<?foreach($followers as $fol): extract($fol);?>
<?if($i > 16 && $i < 21) {?>
      <td>
	<img width=175 src="images/inventory/<?=$itemid?>.jpg" alt="<?=$itemid?> Image"/></td>
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

<?//SPELLS?>
<?if($craft > 2 && $mycharid == 25){?>
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
	<img width=175 src="images/spells/<?=$spellid?>.jpg" alt="<?=$spellid?> Image"/></td>
<?}?>
<?if($i == 3){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>
<br/><br/>

    </center>
  </div>
<?}?>

</div>
