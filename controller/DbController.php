<?php
class DbController extends SQLite3 {
	public function __construct() {
		$this->open('../db/database.db');
	}

}


$dbController = new DbController();

require('../model/user.php');
require('../model/question.php');
require('../model/datas.php');
require('../model/advice.php');


?>