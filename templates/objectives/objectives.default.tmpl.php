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

<?foreach($games as $game): extract($game);?>
<?if($warlock_quests == 1) {?>
<?//QUESTS?>

<a href="#" onclick="toggle_visibility('quest_block');"><b>Warlock Quests</b><br/><br/></a>
<?if($allcomplete == 0) {?>
<div id="quest_block" style="display:block">
<?} else {?>
<div id="quest_block" style="display:none">
<?}?>
    <center>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($quests as $quests): extract($quests);?>
	<?if($complete == 0) {?>
	<td><a onClick="return confirm('Are you sure you wish to complete <?=$qname?>?');" href="index.php?editor=objectives&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$questid?>&action=3"><img width=175 src="images/quests/<?=$questid?>.jpg" alt="<?=$questid?> Image"/></a></td>
	<?} else {?>
	<td><img width=175 src="images/quests/back.jpg" alt="Back Image"/></a></td>
	<?}?>
<?if($i == 4){ break; }?>
<?$i++;?>
<?endforeach;?>

<?if($qcount < 4) {?>
	<td>
	<div class="topimg"><a href="index.php?editor=objectives&gameid=<?=$gameid?>&charid=<?=$charid?>&action=4"><img width=175 src="images/quests/draw.jpg" alt="New Image"/></a></div>
	<div class="botimg"><a href="index.php?editor=objectives&gameid=<?=$gameid?>&charid=<?=$charid?>&action=2"><img width=175 src="images/quests/random.jpg" alt="New Image"/></a></div>
	</td>
<?}?>
</tr>
</div>
</table>

<table style="width: 100%" cellpadding="5"> 	
<div style="padding-top: 1px">  
<tr>
<?$i=1;?>
<?foreach($bahquests as $quest): extract($quest);?>
<?if($i > 4) {?>
	<?if($complete == 0) {?>
	<td><a onClick="return confirm('Are you sure you wish to complete <?=$qname?>?');" href="index.php?editor=objectives&gameid=<?=$gameid?>&charid=<?=$charid?>&id=<?=$questid?>&action=3"><img width=175 src="images/quests/<?=$questid?>.jpg" alt="<?=$questid?> Image"/></a></td>
	<?} else {?>
	<td><img width=175 src="images/quests/back.jpg" alt="Back Image"/></a></td>
	<?}}?>
<?if($i == 8){ break; }?>
<?$i++;?>
<?endforeach;?>

<?if($qcount > 3 && $qcount < 8) {?>
	<td>	
	<div class="topimg"><a href="index.php?editor=objectives&gameid=<?=$gameid?>&charid=<?=$charid?>&action=4"><img width=175 src="images/quests/draw.jpg" alt="New Image"/></a></div>
	<div class="botimg"><a href="index.php?editor=objectives&gameid=<?=$gameid?>&charid=<?=$charid?>&action=2"><img width=175 src="images/quests/random.jpg" alt="New Image"/></a></div>
	</td>
<?}?>
</tr>
</div>
</table>
<br/><br/>

</center>
</div>
<?}?>

<table style="width: 100%" cellpadding="5"> 		
<div style="padding-top: 1px">  
<tr> 	 
<td width="75%" valign="top">
<?if($revealed == 1) {?>
<img src="images/endings/<?=$ending?>.jpg" border="0" alt="Image" width="100%" height="38%"/>
<?} else {?>
<a onClick="return confirm('Are you sure you wish to reveal the ending?');" href="index.php?editor=objectives&gameid=<?=$gameid?>&charid=<?=$charid?>&action=1"><img src="images/endings/back.jpg" border="0" alt="Image" width="100%" height="38%"/></a>
<?}?>
<br/>
<br/> 	
<?if($reaper == 1) { if($rquote == 1) {?>
<b><i>"DAMN RIGHT!" <br/>--The Reaper</i></b><br/><br/> 
<?}if($rquote == 2) {?>
<b><i>"I said Plum!"  <br/>--The Reaper</i></b><br/><br/>
<?}if($rquote == 3) {?>
[to God] <b><i>"They Melvined me."  <br/>--The Reaper</i></b><br/><br/>
<?}if($rquote == 4) {?>
<b><i>"A hit. You have sank my battleship!"  <br/>--The Reaper</i></b><br/><br/>
<?}if($rquote == 5) {?>
<b><i>"You might be a king or a little street sweeper, but sooner or later you dance with the reaper." <br/>--The Reaper</i></b><br/><br/>
<?}?>
<img src="images/characters/death.jpg" onclick="this.src='images/characters/flip.jpg'" border="0" alt="Death image" width="100%" height="38%"/></a>
<?}?>
</td> 
<td width="25%" valign="top"> 		
<div style="height:auto;">  
<br/>
<br/> 	
<table style="border: 1px solid black; background-color: #CCC;">
</table><br/><br/>	
</div> 	
</td>
</tr>
</div>
</table>
<?endforeach;?>