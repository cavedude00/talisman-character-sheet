<table class="edit_form">
         <tr>
           <td class="edit_form_header">
             Options
           </td>
         </tr>
         <tr>
           <td class="edit_form_content">
		<center><a onClick="return confirm('Are you sure you wish resign?');" href="index.php?editor=main&gameid=<?=$gameid?>&charid=<?=$charid?>&action=7">Resign from Game</a><br></center>
		<center><a onClick="return confirm('Are you sure you wish declare yourself the winner?');" href="index.php?editor=main&gameid=<?=$gameid?>&charid=<?=$charid?>&action=8">Declare Yourself Winner</a><br></center>
		<center><a onClick="return confirm('Are you sure you wish to declare a tie?');" href="index.php?editor=main&gameid=<?=$gameid?>&charid=<?=$charid?>&action=9">Declare a Tie</a><br></center>
       	<center><a onClick="return confirm('Are you sure you wish to end the game?');" href="index.php?editor=main&gameid=<?=$gameid?>&charid=<?=$charid?>&action=10">End Game</a><br></center>
		<center><a onClick="return confirm('Are you sure you wish resign a select a new character?');" href="index.php?editor=character&gameid=<?=$gameid?>&charid=<?=$charid?>&action=34">Select a New Character</a><br></center>
              <center><a href="index.php?editor=main&gameid=0&action=3">Switch Game</a><br></center>
          </td>
         </tr>
       </table>