  <form name="emotes" method="post" action="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=charid?>&action=1">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Character Select
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Character</strong><br>
          <select name="charid" style="width: 150px;">
<?foreach($characters as $character): extract($character);?>
               <option value="<?=$id?>"<? echo ($id == $charid) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
          </select><br><br>
                </center>
        <center>
          <input type="submit" value="Select">
        </center>
      </div>
    </div>
  </form>