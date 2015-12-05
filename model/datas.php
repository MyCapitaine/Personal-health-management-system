<?php
require_once('model.php');
class Datas implements Model {
	public $uid;
	public $time;
	public $sportsTime;
	public $restTime;
	public $avgHeartRate;
	public $avgBloodPressure;
	public function createTable(& $dbController) {
		$createDatas =<<<EOF
			create table DATAS
				(
					uid integer NOT NULL,
					time int NOT NULL,
					sportsTime int NOT NULL,
					restTime int NOT NULL,
					avgHeartRate real NOT NULL,
					avgBloodPressure real NOT NULL,
					primary key(uid, time)
				);
EOF;

		if($dbController->exec($createDatas)) {
			echo "<p>datas table created</p>\n";
		}
		else {
			echo "<p>".$dbController->lastErrorMsg()."</p>\n";
		}
	}

	public function dropTable(& $dbController) {
		$dropDatas =<<<EOF
			drop table DATAS;
EOF;

		if($dbController->exec($dropDatas)) {
			echo "<p>datas table dropped</p>\n";
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