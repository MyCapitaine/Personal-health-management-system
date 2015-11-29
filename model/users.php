<?php
require_once('model.php');
class Users implements Model {
	public function createTable(& $dbController) {
		$createUsers =<<<EOF
			create table USERS
				(
					uid int primary key NOT NULL,
					type text NOT NULL,
					userName text NOT NULL,
					password text NOT NULL,
					info text NOT NULL
				);
EOF;

		if($dbController->exec($createUsers)) {
			echo "<p>users table created</p>\n";
		}
		else {
			echo "<p>".$dbController->lastErrorMsg()."</p>\n";
		}
	}

	public function dropTable(& $dbController) {
		$dropUsers =<<<EOF
			drop table USERS;
EOF;

		if($dbController->exec($dropUsers)) {
			echo "<p>users table dropped</p>\n";
		}
		else {
			echo "<p>".$dbController->lastErrorMsg()."</p>\n";
		}

	}

	public function resetTable(& $dbController) {
		$this->dropTable($dbController);
		$this->createTable($dbController);
	}
}

?>