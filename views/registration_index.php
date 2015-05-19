<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo "$registration_heading<br /><br />";
?>
<form action="/mvc/?rt=register/register" method="post">
	<label for="email">Email</label>
	<input type="text" id="email" name="email" value="<?=$email?>" /><br />
	<label for="fname">First Name: </label>
	<input type="text" id="fname" name="fname" value="<?=$fname?>" /><br />
	<label for="lname">Last Name:</label>
	<input type="text" id="lname" name="lname" value="<?=$lname?>" /><br />
	
	<label for="txtFBLink">Facebook:</label>
	<input id="txtFBLink" name="Facebook" value="<?=$txtFBLink?>" size="40" maxlength="255"></input><br />
	
	<label for="txtTwtrLink">Twitter:</label>
	<input id="txtTwtrLink" name="Twitter" value="<?=$txtTwtrLink?>" size="40" maxlength="255"></input><br />

	<label for="txtLnkdIn">Linkedin:</label>
	<input id="txtLnkdIn" name="LinkedIn" value="<?=$txtLnkdIn?>" size="40" maxlength="255" /><br />
	
	<label for="txtGglPlus">Google+:</label>
	<input id="txtGglPlus" name="Google+" value="<?=$txtGglPlus?>" size="40" maxlength="255"></input><br />
	<input type="submit" value="Submit" /> 
</form>
