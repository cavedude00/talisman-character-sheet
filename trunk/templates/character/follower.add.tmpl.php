  <form name="emotes" method="post" action="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=25">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Add Follower
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Followers</strong><br>
          <select name="objectid" style="width: 150px;">
<?foreach($followers as $follower): extract($follower);?>
                   <option value="<?=$id?>"<?echo ($id == $objectid)? " selected" : "";?>><?=$name?></option>
<?endforeach;?>
                 </select><br><br>
        <center>
          <input type="submit" value="Add">
        </center>
      </div>
    </div>
  </form>