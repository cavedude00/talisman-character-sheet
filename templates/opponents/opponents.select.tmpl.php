  <form name="emotes" method="post" action="index.php?editor=opponents&gameid=<?=$gameid?>&charid=<?=$charid?>&action=1">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Select Opponent
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Opponent</strong><br>
          <select name="oppid" style="width: 150px;">
<?foreach($opponents as $opponent): extract($opponent);?>
               <option value="<?=$playerid?>"<? echo ($playerid == $oppid) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
          </select><br><br>
                </center>
        <center>
          <input type="submit" value="Select">
        </center>
      </div>
    </div>
  </form>