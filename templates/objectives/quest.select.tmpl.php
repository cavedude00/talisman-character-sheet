  <form name="emotes" method="post" action="index.php?editor=objectives&gameid=<?=$gameid?>&playerid=<?=$playerid?>&charid=<?=$charid?>&action=5">
    <div class="edit_form" style="width: 325px;">
      <div class="edit_form_header">
        Select Quest
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Quest</strong><br>
          <select name="questid" style="width: 300px;">
<?foreach($quests as $quest): extract($quest);?>
               <option value="<?=$id?>"<? echo ($id == $questid) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
          </select><br><br>
                </center>
        <center>
          <input type="submit" value="Select">
        </center>
      </div>
    </div>
  </form>