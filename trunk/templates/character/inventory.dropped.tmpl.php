  <form name="emotes" method="post" action="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=27">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Dropped Objects
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Objects</strong><br>
          <select name="objectid" style="width: 150px;">
<?foreach($objects as $object): extract($object);?>
                   <option value="<?=$id?>"<?echo ($id == $objectid)? " selected" : "";?>><?=$name?></option>
<?endforeach;?>
                 </select><br><br>
        <center>
          <input type="submit" value="Add">
        </center>
      </div>
    </div>
  </form>