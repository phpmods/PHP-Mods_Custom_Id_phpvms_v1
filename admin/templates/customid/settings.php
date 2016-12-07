<?php
///////////////////////////////////////////////
///      CustomId v1.0 by php-mods.eu       ///
///            Author php-mods.eu           ///
///           Packed at 7/12/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Database Tables Update</h3>
<p>Below you will have to set the database tables of your phpVMS systems which store a pilot's id. Most of these values have to do with a pilot. The list already includes some entries which have to do with the default phpVMS tables. You will have to add new entries based on the modules you are using on your phpVMS system.</p>
<p>If you do not include all of the tables which maintain a pilot's id, this might cause issues with your website. So, be carefull and in case you have any question, post your question in the module's thread in the phpVMS support forum.</p>

<p><i>Example:</i> As you might be able to see, there is a default setting for the database table "awardsgranted". When an award is granted to a pilot, it is granted based on his id. This id is stored in the "awardsgranted" database table and the column it is granted is titled "pilotid". When you wish to update the pilot's id it is not enough to change it from the pilots database table cause this pilot might has awards issued to him/her. If you run the pilot id update using this module, the "awardsgranted" table will be updated including the rest of the tables you have added in the module settings which can be found below.</p>
<table id="tabledlist" class="tablesorter">
<thead>
	<tr>
    	<th align="center" width="10%">#</th>
        <th align="center" width="35%">Table Name</th>
        <th align="center" width="35%">Column Name</th>
        <th align="center" width="20%">Administrate</th>
    </tr>
</thead>
<tbody>
<?php $i = 0;
if($settings) {
	foreach($settings as $setting) { $i++; ?>
		<tr>
        	<td align="center"><i>#<?php echo $i; ?></i></td>
            <td align="center"><?php echo $setting->table_name; ?></td>
            <td align="center"><?php echo $setting->column_name; ?></td>
            <td><?php if($setting->status == 0) {echo '<i>This setting cannot be edited because it has to do with the default phpVMS database tables.</i>';} else { ?> 
										<a href="<?php echo SITE_URL; ?>/admin/index.php/CustomId/setting_edit/<?php echo $setting->id; ?>" class="button">Edit</a>
										<a href="<?php echo SITE_URL; ?>/admin/index.php/CustomId/delete_setting/<?php echo $setting->id; ?>" class="button" onclick="return confirm('Are you sure you want to remove this setting?');">Delete</a>
								<?php } ?></td>
        </tr>
	<?php }
} ?>
<tr><td align="center" colspan="4"><a href="<?php echo SITE_URL; ?>/admin/index.php/CustomId/setting_add" class="button">Add New Setting</a></td></tr>
</tbody>
</table>
<hr />
<p>Copyright &copy; 2016 - Version 1.0 - <a href="http://php-mods.eu" target="_blank">PHP-Mods</a></p>