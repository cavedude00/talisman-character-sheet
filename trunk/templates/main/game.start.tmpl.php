
      <form name="create" method="post" action=index.php?editor=main&gameid=<?=$gameid?>&action=2">
         <div class="edit_form" style="width: 238px;">
        <div class="edit_form_header">
          Create Game
        </div>
         <div class="edit_form_content">
            <strong>Name</strong><br>
            <input class="indented" id="id" type="text" name="gamename" size="30" value="Game<?=$randomname?>"><br><br>
	     <input class="indented" type="checkbox" name="death" value=1 <?echo 1 ? "checked" : ""?>> Use the Reaper<br><br>
	     <input class="indented" type="checkbox" name="warlock" value=1 <?echo 1 ? "checked" : ""?>> Use Warlock Quests<br><br>
            <input class="indented" type="checkbox" name="quest" value=1 <?echo 1 ? "checked" : ""?>> Use Quest Rewards<br><br>
	     Ending:<br/><br/>
	     <center><input type="radio" id="end_normal" name="ending" value=1<?echo 0 ? ' checked' : '';?>>Normal <input type="radio" id="end_hidden" name="ending" value=2<?echo 0 ? ' checked' : '';?>>Hidden <input type="radio" id="end_revealed" name="ending" value=3<?echo 0 ? ' checked' : '';?>>Revealed<br/><br/>
		<b>OR</b><br/><br/>
		Select Ending:<br>
          <select name="sel_ending" style="width: 150px;">
<?foreach($endings as $end): extract($end);?>
               <option value="<?=$id?>"<? echo ($id == $ending) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
          </select></center><br><br>
	     <br/><br/>
        <center>
          <input type="submit" value="Create Game">
        </center>
      </form>
      </div>
      </div>