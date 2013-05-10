<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr> 	 		
<center>
<b>Character Select</b> <br/><br/>
<?foreach($charselect as $cd): extract($cd);?>	
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$id?>&action=1"><img src="images/characters/<?=$id?>.jpg" border="0" alt="<?=$id?> image" width="100%" height="38%"/></a><br/><br/>
<?endforeach;?>
</center>
</tr>
</div>
</table>