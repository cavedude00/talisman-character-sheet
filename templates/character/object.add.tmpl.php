<?if($isbag == 1){ $action = 39;} elseif($dropped == 1){ $action = 27;} else { $action = 23;}?>

<?if($objects < 1){?>
<br/><br/><br/><center><div class='tab_title'><b><i>No available items!</b></i></div></center>
<?}?>
<div>
<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($objects as $object): extract($object);?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
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
<?foreach($objects as $obj): extract($obj);?>
<?if($i > 4) {?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
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
<?foreach($objects as $objec): extract($objec);?>
	<?if($i > 8) {?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
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
<?foreach($objects as $objec): extract($objec);?>
	<?if($i > 12) {?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
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
<?foreach($objects as $objec): extract($objec);?>
	<?if($i > 16) {?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
	<?}?>
<?if($i == 20){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($objects as $objec): extract($objec);?>
	<?if($i > 20) {?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
	<?}?>
<?if($i == 24){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($objects as $objec): extract($objec);?>
	<?if($i > 24) {?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
	<?}?>
<?if($i == 28){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($objects as $objec): extract($objec);?>
	<?if($i > 28) {?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=<?=$action?>"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
	<?}?>
<?if($i == 32){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>
</div>