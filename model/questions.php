<?php

require_once('model.php');
class Questions implements Model {
	public function createTable(& $dbController) {
		$createQuestions =<<<EOF
			create table QUESTIONS
				(
					posterId integer NOT NULL,
					reciverId integer NOT NULL,
					postTime int NOT NULL,
					recived bool NOT NULL,
					inner text NOT NULL
				);
EOF;

		if($dbController->exec($createQuestions)) {
			echo "<p>questions table created</p>\n";
		}
		else {
			echo "<p>".$dbController->lastErrorMsg()."</p>\n";
		}
	}

	public function dropTable(& $dbController) {
		$dropQuestions =<<<EOF
			drop table QUESTIONS;
EOF;

		if($dbController->exec($dropQuestions)) {
			echo "<p>questions table dropped</p>\n";
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