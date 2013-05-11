<div>
<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($alignments as $key=>$value):?>
	<td><a onClick="return confirm('Are you sure you wish to set your alignment to <?=$value?>?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&alignment=<?=$key?>&action=17"><img width=175 src="images/alignment/<?=$key?>.jpg" alt="<?=$key?> Image"/></a></td>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>
</tr>
</div>
</table>
</div>