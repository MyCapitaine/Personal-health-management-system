<?php
require_once('model.php');
class Activities implements Model{
	public function createTable(& $dbController) {
		$createActivities =<<<EOF
			create table ACTIVITIES
				(
					AID int primary key NOT NULL,
					uid int NOT NULL,
					createUid int NOT NULL,
					inner text NOT NULL,
					time int NOT NULL,
					status text NOT NULL
				);
EOF;

		if($dbController->exec($createActivities)) {
			echo "<p>activities table created</p>\n";
		}
		else {
			echo "<p>".$dbController->lastErrorMsg()."</p>\n";
		}

	}

	public function dropTable(& $dbController) {
		$dropActivities =<<<EOF
			drop table ACTIVITIES;
EOF;
		if($dbController->exec($dropActivities)) {
			echo "<p>activities table dropped</p>\n";
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