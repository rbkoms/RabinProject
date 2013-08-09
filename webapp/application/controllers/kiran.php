<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kiran extends CI_Controller {

	public $version;

	// GetMigrationVersion
	// get_migration_version

	public function index() {
	}

	public function up() {
	
		$this->version = $this->get_migration_version() + 1;
		$this->message = 'Moved up to migration '.$this->version;
		$this->migrate_to_version();
	}

	public function down() {

		$this->version = $this->get_migration_version() - 1;
		$this->message = 'Moved down to migration '.$this->version;
		$this->migrate_to_version();
	}


	private function get_migration_version() {
		
		$row = $this->db->get('migrations')->row();
		return $row ? $row->version : 0;
	}

	private function migrate_to_version() {

		$this->migration->version($this->version);
	}

	private function jump_to_version($my_version) {
		$this->migration->version($my_version);
	}

	public function jump($version) {

		$this->migration->version($version);
	}

	public function reset() {

		$my_database = $this->db->database;

		$this->db->query("DROP DATABASE `$my_database`");
		$this->db->query("CREATE DATABASE `$my_database`");
	}
}