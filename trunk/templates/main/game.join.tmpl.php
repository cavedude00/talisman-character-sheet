  <form name="emotes" method="post" action="index.php?editor=main&gameid=<?=$gameid?>&action=4">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Join Game
      </div>
      <div class="edit_form_content">
        <center>
          <strong>Game</strong><br>
          <select name="gameid" style="width: 150px;">
<?foreach($games as $game): extract($game);?>
               <option value="<?=$id?>"<? echo ($id == $gameid) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
          </select><br><br>
                </center>
        <center>
          <input type="submit" value="Join">
        </center>
      </div>
    </div>
  </form>