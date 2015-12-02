<?php
require_once('model.php');
class Activities implements Model{
	public $aid;
	public $creatorUid;
	public $activityName;
	public $inner;
	public $time;
	public $status;
	public $joinersIdList;
	public function createTable(& $dbController) {
		$createActivities =<<<EOF
			create table ACTIVITIES
				(
					AID integer primary key autoincrement NOT NULL,
					creatorUid integer NOT NULL,
					activityName text NOT NULL,
					inner text NOT NULL,
					time int NOT NULL,
					status text NOT NULL
				);

			create table ACTORS
				(
					AID integer NOT NULL,
					uid integer NOT NULL
				);

EOF;

		if($dbController->exec($createActivities)) {
			echo "<p>activities and actors table created</p>\n";
		}
		else {
			echo "<p>".$dbController->lastErrorMsg()."</p>\n";
		}

	}

	public function dropTable(& $dbController) {
		$dropActivities =<<<EOF
			drop table ACTIVITIES;
			drop table ACTORS;
EOF;
		if($dbController->exec($dropActivities)) {
			echo "<p>activities and actors table dropped</p>\n";
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