  <form name="emotes" method="post" action="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&charid=<?=$charid?>&action=42">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Select Spell
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Spell</strong><br>
          <select name="spellid" style="width: 150px;">
<?foreach($spells as $spell): extract($spell);?>
               <option value="<?=$id?>"<? echo ($id == $spellid) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
          </select><br><br>
                </center>
        <center>
          <input type="submit" value="Select">
        </center>
      </div>
    </div>
  </form>