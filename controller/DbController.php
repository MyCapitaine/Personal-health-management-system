<?php
require_once('../model/users.php');
require_once('../model/questions.php');
require_once('../model/datas.php');
require_once('../model/advices.php');
require_once('../model/activities.php');
class DbController extends SQLite3 {
	public $users;
	public $questions;
	public $datas;
	public $advices;
	public $activities;
	public function __construct() {
		$this->open('../db/database.db');
		$this->users = new Users();
		$this->questions = new Questions();
		$this->datas = new Datas();
		$this->advices = new Advices();
		$this->activities = new Activities();
	}

	public function createAllTables() {
		$this->users->createTable($this);
		$this->questions->createTable($this);
		$this->datas->createTable($this);
		$this->advices->createTable($this);
		$this->activities->createTable($this);
	}

	public function dropAllTables() {
		$this->users->dropTable($this);
		$this->questions->dropTable($this);
		$this->datas->dropTable($this);
		$this->advices->dropTable($this);
		$this->activities->dropTable($this);
	}

	public function resetAllTables() {
		$this->users->resetTable($this);
		$this->questions->resetTable($this);
		$this->datas->resetTable($this);
		$this->advices->resetTable($this);
		$this->activities->resetTable($this);
	}

}



?>