<?php
///////////////////////////////////////////////
///      CustomId v1.0 by php-mods.eu       ///
///            Author php-mods.eu           ///
///           Packed at 7/12/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

class CustomId extends CodonModule {
	public function HTMLHead() {
        $this->set('userinfo', Auth::$userinfo);
		$this->set('sidebar', 'customid/sidebar.php');
    }
	public function NavBar() {
        	echo '<li><a href="'.SITE_URL.'/admin/index.php/CustomId">Custom Pilot Id</a></li>';
    }
	public function index() {
		if($this->post->submit == 'Check ID') {
			self::check_id();
			return;
		} 
		if($this->post->submit == 'Update ID') {
			self::update_id();
			return;
		}
		$this->set('pilots', CustomIdData::getAllPilots());
		$this->render('customid/index');
	}
	public function help() {
		$this->render('customid/help');
	}
	private function check_id() {
		if($this->post->pilotid == '' || !is_numeric($this->post->pilotid)) {
			$this->set('message', 'The pilot id should be a numerical value.');
			$this->show('core_error');
			$this->set('pilots', CustomIdData::getAllPilots());
			$this->render('customid/index');
			return;
		}
		echo '<h3>Checking Database Tables</h3>';
		$settings = CustomIdData::getTableSettings();
		if($settings) {
			foreach($settings as $setting) {
				echo '<i>Checking</i> '; echo TABLE_PREFIX.$setting->table_name; 
				if(CustomIdData::checkDatabaseTable($setting->table_name, $setting->column_name, $this->post->pilotid)) 
					echo ' - <font color="green"><b>OK</b></font>'; 
				else 
					echo ' - <font color="red"><b>Error!</b></font>';
				echo '<br />';
			}
		}
		echo '<i>Checking</i> '; echo TABLE_PREFIX.'pilots'; 
		if(CustomIdData::checkDatabaseTable('pilots', 'pilotid', $this->post->pilotid)) 
			echo ' - <font color="green"><b>OK</b></font>'; 
		else 
			echo ' - <font color="red"><b>Error!</b></font>';
		echo '<br />';
		echo '<p>If there is at least on "error", you are not able to set this ID to any pilot.</p>';
		echo '<p><a href="'.SITE_URL.'/admin/index.php/CustomId" class="button">Go Back</a>';
	}
	private function update_id() {
		if($this->post->pilot == '' || $this->post->new_id == '' || !is_numeric($this->post->new_id)) {
			$this->set('message', 'The pilot id should be a numerical value.');
			$this->show('core_error');
			$this->set('pilots', CustomIdData::getAllPilots());
			$this->render('customid/index');
			return;
		}
		echo '<h3>Attempting to update the pilot ID</h3>';
		$pilot = CustomIdData::getPilot($this->post->pilot);
		echo 'The pilot is '.PilotData::getPilotCode($pilot->code, $pilot->pilotid).' - '.$pilot->firstname.' '.$pilot->lastname.'.<br />';
		echo 'The new pilot id you selected is '.PilotData::getPilotCode($pilot->code, $this->post->new_id).'.<br /><br />';
		echo '<b>Checking the new ID...</b>';
		if(!CustomIdData::checkDatabaseTablesById($this->post->new_id)) { 
			echo '<p><font color="red"><b>This pilot ID cannot be used.</b></font></p>'; 
		} else {
			echo '<p><font color="green"><b>This pilot ID can be used.</b></font></p>'; 
			echo 'Updating the pilot ID...<br />';
			CustomIdData::updatePilotId($pilot->pilotid, $this->post->new_id);
			echo 'The pilot ID has been updated successfully.';
		}
		echo '<p><a href="'.SITE_URL.'/admin/index.php/CustomId" class="button">Go Back</a>';
	}
	public function settings() {
		$this->set('settings', CustomIdData::getTableSettings());
		$this->render('customid/settings');
	}
	public function setting_add() {
		$this->render('customid/setting_add');
	}
	public function insert_setting() {
		if($this->post->table == '' or $this->post->column == '') {
			$this->set('message', 'All the fields are required, fill them all please.');
			$this->show('core_error');
			$this->set('table', $this->post->table);
			$this->set('column', $this->post->column);
			$this->set('error', 1);
			self::setting_add();
			return;
		}
		$table = DB::escape($this->post->table);
		$column = DB::escape($this->post->column);
		CustomIdData::insert_setting($table, $column);
		$this->set('message', 'Setting Added Succefully');
		$this->show('core_success');
		self::settings();
		LogData::addLog(Auth::$userinfo->pilotid, 'Added a new setting ('.$table.'/'.$column.').');
	}
	public function setting_edit($id) {
		$data = CustomIdData::getSettingData($id);
		if(!$id || !$data || $data->status == 0) {
			$this->set('message', 'This is not a valid setting ID.');
			$this->show('core_error');
			self::settings();
			return;
		}
		$this->set('data', $data);
		$this->render('customid/setting_edit');
	}
	public function update_setting() {
		if($this->post->table == '' or $this->post->column == '') {
			$this->set('message', 'All the fields are required, fill them all please.');
			$this->show('core_error');
			$this->set('table', $this->post->table);
			$this->set('column', $this->post->column);
			$this->set('error', 1);
			self::setting_edit($this->post->id);
			return;
		}
		$table = DB::escape($this->post->table);
		$column = DB::escape($this->post->column);
		$id = DB::escape($this->post->id);
		CustomIdData::update_setting($table, $column, $id);
		$this->set('message', 'Setting Updated Succefully');
		$this->show('core_success');
		self::settings();
		LogData::addLog(Auth::$userinfo->pilotid, 'Updated a setting ('.$table.'/'.$column.').');
	}
	public function delete_setting($id) {
		$data = CustomIdData::getSettingData($id);
		if(!$id || !$data || $data->status == 0) {
			$this->set('message', 'This is not a valid setting ID.');
			$this->show('core_error');
			self::settings();
			return;
		}
		CustomIdData::delete_setting($id);
		$this->set('message', 'Setting Deleted Succefully');
		$this->show('core_success');
		self::settings();
		LogData::addLog(Auth::$userinfo->pilotid, 'Deleted a setting ('.$data->table_name.'/'.$data->column_name.').');
	}
}