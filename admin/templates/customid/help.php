<?php
///////////////////////////////////////////////
///      CustomId v1.0 by php-mods.eu       ///
///            Author php-mods.eu           ///
///           Packed at 7/12/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Documentation Page</h3>
<p>This module allows you to change a pilot's ID. By defauly, in phpVMS, pilots are not able to change their ID because it has to do with all their data stored in the database. This mean that changing a pilot's id manually might result in a data-loss. This module allows you to set up your database tables and change a pilot's ID without loosing any of his/her data which are stored in the database.</p>
<hr />
<h3>How to Set Up the module</h3>
<p>The module has a settings page. In this page, you will have to add the database tables and columns which store a pilot's ID. By default, the default phpVMS are included in the module settings and you cannot edit or delete them. You can add as many tables/colums you want based on the modules you have installed on your system.</p>
<p>If you mish to add a database table in the module settings, the data stored in this database table will be lost and the pilot will not "own" them in case you update his/her pilot ID. Below, we are going to introduce an example based on the phpVMS Screenshots Center module developed by simpilot which can be found here.</p>
<hr />
<h3>Example of Screenshot Center Module</h3>
<p><img src="<?php echo SITE_URL; ?>/admin/templates/customid/screenshots_database.png" style="float:left; margin-right: 10px;" />If you get into your phpVMS database, you will see that the screenshot center module uses 3 database tables. These are <i>screenshots</i>, <i>screenshots_comments</i> and <i>screenshots_rating</i>. Of course, each table has a database prefix. In the screenshot below, you will see that the database prefix is <i>phpvms_</i>.</p>
<p>As you can understand, <i>screenshots</i> table includes the screenshots which have been added by your pilots, <i>screenshots_comment</i> includes the comments which have been added under the screenshots and <i>screenshots_ratings</i> includes the ratings which have been set by your pilots for each screenshot.</p>
<p>In our system, there are two pilots. The first one is DEV0002 Captain Jim and the second one is DEV0015 Captain John.</p>
<p><img src="<?php echo SITE_URL; ?>/admin/templates/customid/screenshots_example.png" height="400px" style="float:left; margin-right: 10px;" /> As you can see in the example, there is a screenshot which has been added by DEV0015 Captain John and there is also a comment under the screenshot which has been added by DEV0002 Captain Jim.</p>
<p>This means that the <i>screenshots</i> database table has an entry with pilot ID = 15 and the <i>screenshots_comments</i> database table has an entry with pilot ID = 2.</p>
<p>Let's say that you have not included the screenshots module database tables in the module settings and you decide to change the DEV0015 Captain John pilot ID from <i>DEV0015</i> to <i>DEV0016</i>. This in reality means that you change the pilot's ID from 15 to 16.</p>
<p>If the screenshots module's database tables does not get updated accordingly, the module will keep that this screenshot has been added by the pilot with ID 15 which is something false because his/her ID has been changed to 16. In that case, the "<b>Screenshot by:</b>" will be empty because it will not be able to find the pilot with ID 15.</p>
<p>Let's say that after that, you decide to change the DEV0002 Captain Jim ID from 2 to 15. As you can understand that screenshot will be shown that was posted by Captain Jim (because his ID will be 15) and the comment posted by entry will be empty just like it happened before.</p>
<p>So, what is this module doing? As soon as you set up the module settings correctly, it searches over the selected table and changes the pilot ID from the old value to the new one. As we descriped above, the Screenshot Module has three database tables. All of these tables keep data which have to do with your pilots. Let's check the tables one by one.</p><br /><br /><br /><br />
<p>Let's start with the <i>screnshots</i> database table. As I have written above, this table stores the screenshots which have been uploaded by your pilots. This table has several columns and we should find out in which column does the pilot ID gets stored. Below you can view a screenshot of the table's columns.</p>
<p><img src="<?php echo SITE_URL; ?>/admin/templates/customid/screenshots_screenshots_table.png" /></p>
<p>If you have some basic knowledge, you will understand that the pilot id who posted the screenshot is being stored to the "pilot_id" column. This means that the "<b><i>screenshots</i></b>" table keeps the pilot id in the "<b><i>pilot_id</i></b>" column.</p>
<p>The same should be done for the rest of the module database tables. Below you can see the screenshots_comments database table.</p>
<p><img src="<?php echo SITE_URL; ?>/admin/templates/customid/screenshots_comments_table.png" /></p>
<p>As you can understand the pilot ID is stored in the "pilot_id" column. This means that the "<b><i>screenshots_comments</i></b>" table keeps the pilot id in the "<b><i>pilot_id</i></b>" column.</p>
<p>Finally below you can see the screenshots_ratings database table.</p>
<p><img src="<?php echo SITE_URL; ?>/admin/templates/customid/screenshots_ratings_table.png" /></p>
<p>As you can understand the pilot ID is stored in the "pilot_id" column. This means that the "<b><i>screenshots_ratings</i></b>" table keeps the pilot id in the "<b><i>pilot_id</i></b>" column.</p>
<p>As soon as we have analyzed the module's database tables, we are ready to proceed and update the Custom Id Module Settings accordingly. We will have to add three settings, one for each database table which stores the pilot's id.</p>
<p><img src="<?php echo SITE_URL; ?>/admin/templates/customid/settings.png" style="float:left; margin-right: 10px" /> We will have to submit the form with the following data.<br /></p>
<table width="25%" border="0">
<tr>
	<td rowspan="2" width="20%"><b><u>1st</u></b></td>
    <td width="40%"><b>Database Name:</b></td>
    <td width="40%">screenshots</td>
</tr>
<tr>
	<td><b>Column Name:</b></td>
    <td>pilot_id</td>
</tr>
<tr>
	<td rowspan="2" width="20%"><b><u>2nd</u></b></td>
    <td width="40%"><b>Database Name:</b></td>
    <td width="40%">screenshots_comments</td>
</tr>
<tr>
	<td><b>Column Name:</b></td>
    <td>pilot_id</td>
</tr>
<tr>
	<td rowspan="2" width="20%"><b><u>3rd</u></b></td>
    <td width="40%"><b>Database Name:</b></td>
    <td width="40%">screenshots_ratings</td>
</tr>
<tr>
	<td><b>Column Name:</b></td>
    <td>pilot_id</td>
</tr>
</table>
<p>In our example, all of the database tables store a pilot id. There are modules whose database tables does not all store a pilot's ID. Also, there are table where the column name can be different from pilot_id or pilotid.</p>
<hr />
<h3>Further Help</h3>
<p>PHP-Mods can assist you and set up the module for you at an extra cost in case you are not able to do this on your own. You can open a new support ticket under PHP-Mods Billing System via <a href="http://php-mods.eu/submitticket.php?step=2&deptid=2" target="_blank">here</a>. We do not offer support for this module via support tickets. If you have problems installing the module, post your question in the forum.</p>
<p>If you have any question, you can post it in the phpVMS forum. If you are not able to understand which database tables store the pilots ID, you can get in touch with the module's developer and he/she should be able to assist you.</p>
<hr />
<p>Copyright &copy; 2016 - Version 1.0 - <a href="http://php-mods.eu" target="_blank">PHP-Mods</a></p>