  <form name="emotes" method="post" action="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=17">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Change Alignment
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Alignments</strong><br>
          <select name="alignment" style="width: 150px;">
<?foreach($alignments as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $alignment)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>
        <center>
          <input type="submit" value="Change">
        </center>
      </div>
    </div>
  </form>