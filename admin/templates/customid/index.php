<?php
///////////////////////////////////////////////
///      CustomId v1.0 by php-mods.eu       ///
///            Author php-mods.eu           ///
///           Packed at 7/12/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Update a Pilot's Id</h3>
<p>This module allows you to update a pilot's ID without loosing any of his/her data stored in the phpVMS database. Before you proceed in a pilot ID update, make sure that you have set up the module settings correctly based on your dabatase and the modules you have installed.</p>
<hr />
<h3>Check Pilot Id</h3>
<form action="" method="post">
<table width="35%" border="0">
<tbody>
	<tr>
    	<td width="20%"><b>Set Id to Check:</b></td>
        <td width="80%"><input type="text" name="pilotid" /></td>
    </tr>
    <tr>
    	<td></td>
        <td><input type="submit" name="submit" value="Check ID" /></td>
    </tr>
</tbody>
</table>
<hr />
<h3>Update Pilot Id</h3>
<table width="35%" border="0">
<tbody>
	<tr>
    	<td width="20%"><b>Select Pilot:</b></td>
        <td width="80%"><select name="pilot">
        		<?php foreach($pilots as $pilot) { if(Auth::$userinfo->pilotid == $pilot->pilotid) continue; ?>
        			<option value="<?php echo $pilot->pilotid; ?>"><?php echo PilotData::getPilotCode($pilot->code, $pilot->pilotid); ?> - <?php echo $pilot->firstname; ?> <?php echo $pilot->lastname; ?></option>
                <?php } ?>
            </select></td>
    </tr>
    <tr>
    	<td><b>Select New Id:</b></td>
        <td><input type="text" name="new_id" /></td>
    </tr>
    <tr>
    	<td></td>
        <td><input type="submit" name="submit" value="Update ID" /></td>
    </tr>
</tbody>
</table>
</form>
<hr />
<p>Copyright &copy; 2016 - Version 1.0 - <a href="http://php-mods.eu" target="_blank">PHP-Mods</a></p>