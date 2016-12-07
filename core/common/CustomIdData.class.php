<?php
///////////////////////////////////////////////
///      CustomId v1.0 by php-mods.eu       ///
///            Author php-mods.eu           ///
///           Packed at 7/12/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

class CustomIdData extends CodonData {
	public static function getAllPilots() {
		$sql = "SELECT * FROM ".TABLE_PREFIX."pilots ORDER BY pilotid";
		return DB::get_results($sql);
	}
	public static function getPilot($pilotid) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."pilots WHERE pilotid='$pilotid'";
		return DB::get_row($sql);
	}
	public static function getTableSettings() {
		$sql = "SELECT * FROM ".TABLE_PREFIX."customid_sets ORDER BY id";
		return DB::get_results($sql);
	}
	public static function getSettingData($id) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."customid_sets WHERE id='$id'";
		return DB::get_row($sql);
	}
	public static function insert_setting($table, $column) {
		$sql = "INSERT INTO ".TABLE_PREFIX."customid_sets (table_name, column_name, status) VALUES ('$table', '$column', 1)";
		DB::query($sql);
	}
	public static function update_setting($table, $column, $id) {
		$sql = "UPDATE ".TABLE_PREFIX."customid_sets SET table_name='$table', column_name='$column' WHERE id='$id'";
		DB::query($sql);
	}
	public static function delete_setting($id) {
		$sql = "DELETE FROM ".TABLE_PREFIX."customid_sets WHERE id='$id'";
		DB::query($sql);
	}
	public static function checkDatabaseTable($table, $column, $value) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."$table WHERE $column='$value'";
		$result = DB::get_results($sql);
		if($result) return false;
		return true;
	}
	public static function checkDatabaseTablesById($id) {
		$flag = true;
		$settings = self::getTableSettings();
		if($settings) {
			foreach($settings as $setting) {
				if(!CustomIdData::checkDatabaseTable($setting->table_name, $setting->column_name, $id)) { $flag = false; break; }
			}
		}
		if(!CustomIdData::checkDatabaseTable('pilots', 'pilotid', $id)) { $flag = false; }
		return $flag;
	}
	public static function updatePilotId($current, $new) {
		$sql = "SET foreign_key_checks = 0";
		DB::query($sql);
		$settings = self::getTableSettings();
		if($settings) {
			foreach($settings as $setting) {
				$sql = "UPDATE ".TABLE_PREFIX."$setting->table_name SET $setting->column_name='$new' WHERE $setting->column_name='$current'";
				DB::query($sql);
			}
		}
		$sql = "UPDATE ".TABLE_PREFIX."pilots SET pilotid='$new' WHERE pilotid='$current'";
		DB::query($sql);
		$sql = "SET foreign_key_checks = 1";
		DB::query($sql);
	}
}