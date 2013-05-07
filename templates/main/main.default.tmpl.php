<table class="edit_form">
         <tr>
           <td class="edit_form_header">
             Options
           </td>
         </tr>
         <tr>
           <td class="edit_form_content">
		<center><a href="index.php?editor=main&gameid=<?=$gameid?>&action=1">Start a New Game</a><br></center>
		<?if($gamecount > 0) {?>
		<center><a href="index.php?editor=main&gameid=<?=$gameid?>&action=3">Join Existing Game</a><br></center>
			<?if(session::is_admin()) {?>
			<center><a href="index.php?editor=main&gameid=<?=$gameid?>&action=5">Delete a Game</a><br></center>
			<?}?>
		<?}?>
          </td>
         </tr>
       </table>