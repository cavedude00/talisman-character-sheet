<div>
<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($objects as $object): extract($object);?>
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=23"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
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
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=23"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
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
	<td><a onClick="return confirm('Are you sure you wish draw <?=$name?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&objectid=<?=$id?>&action=23"><img width=175 src="images/inventory/<?=$id?>.jpg" alt="<?=$id?> Image"/></a></td>
	<?}?>
<?if($i == 12){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>
</div>