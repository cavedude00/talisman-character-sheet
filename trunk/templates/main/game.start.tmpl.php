
      <form name="create" method="post" action=index.php?editor=main&gameid=<?=$gameid?>&action=2">
         <div class="edit_form" style="width: 238px;">
        <div class="edit_form_header">
          Create Game
        </div>
         <div class="edit_form_content">
            <strong>Name</strong><br>
            <input class="indented" id="id" type="text" name="gamename" size="30" value="Game<?=$randomname?>"><br><br>
        <center>
          <input type="submit" value="Create Game">
        </center>
      </form>
      </div>
      </div>