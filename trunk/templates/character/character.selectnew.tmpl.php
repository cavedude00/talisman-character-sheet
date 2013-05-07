<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr> 	 	
<td width="75%" valign="top"> 
<br/>
</br/> 	
<center>
<b>Character Select</b> <br/><br/>
<?foreach($charselect as $cd): extract($cd);?>	
<a href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$id?>&oldcharid=<?=$oldcharid?>&action=35"><img src="images/characters/<?=$id?>.jpg" border="0" alt="<?=$id?> image" width="100%" height="38%"/></a><br/><br/>
<?endforeach;?>
</center>
</td>

<td width="25%" valign="top"> 		
<div style="height:auto;">  
<br/>
<br/> 	
</div>
</td>

</tr>
</div>
</table>