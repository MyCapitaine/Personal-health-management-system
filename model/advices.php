<?php
require_once('model.php');
class Advices implements Model{
	public function createTable(& $dbController) {
		$createAdvices =<<<EOF
			create table ADVICES
				(
					posterId int NOT NULL,
					reciverId int NOT NULL,
					postTime int NOT NULL,
					recived bool NOT NULL,
					inner text NOT NULL
				);
EOF;

		if($dbController->exec($createAdvices)) {
			echo "<p>advices table created</p>\n";
		}
		else {
			echo "<p>".$dbController->lastErrorMsg()."</p>\n";
		}

	}

	public function dropTable(& $dbController) {
		$dropAdvices =<<<EOF
			drop table ADVICES;
EOF;
		if($dbController->exec($dropAdvices)) {
			echo "<p>advices table dropped</p>\n";
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