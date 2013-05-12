      <div id="header">
    <br><br><br>
<center> <a href="index.php"><img src="images/talisman.jpg" title="Home" border="0" alt="Banner"></a></center>
      </div> 
	 <center>
        <br><br><h1>Talisman Character Sheet</h1>
        <br><br>

<?if($error == 1):?>
        <font color="red">Invalid username/password or logins are disabled.</font><br><br><br>
<?endif;?>
        <form method="post" action="index.php?login">
        <table width="250">
          <tr>
            <td align="left">
              <strong>Login:</strong>
            </td>
            <td align="right">
              <input type="text" name="login" value="<?=$login?>">
            </td>
          </tr>
          <tr>
            <td align="left">
              <strong>Password:</strong>
            </td>
            <td align="right">
              <input type="password" name="password" value="<?=$password?>">
            </td>
          </tr>
		<tr>
            <td colspan="2" align="center">
              <br><br><input type="submit" value="Login" style="width:60px;"><br><br><br>

            </td>
          </tr>
        </table>
        </form>
      </center>