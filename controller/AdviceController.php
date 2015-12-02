<?php
require_once('DbController.php');
class AdviceController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}
	
	public function makeAdvice($posterId, $reciverId, $info) {
		$command = "insert into ADVICES values(".$posterId.",".$reciverId.",".time().",0,'".$info."');";
		return $this->dbController->exec($command);
	}

	public function posterGetAdvices($posterId) {
		$command = "select * from ADVICES where posterId = ".$posterId.";";
		$result = $this->dbController->query($command);
		$advices = array();
		while($row = $result->fetchArray()) {
			$advice = new Advices();
			$advice->posterId = $row['posterId'];
			$advice->reciverId = $row['reciverId'];
			$advice->postTime = $row['postTime'];
			$advice->recived = $row['recived'];
			$advice->inner = $row['inner'];
			$advices[] = $advice;
		}
		return $advices;
	}

	public function reciverGetAdvices($reciverId) {
		$command = "select * from ADVICES where reciverId = ".$reciverId.";";
		$result = $this->dbController->query($command);
		$advices = array();
		while($row = $result->fetchArray()) {
			$advice = new Advices();
			$advice->posterId = $row['posterId'];
			$advice->reciverId = $row['reciverId'];
			$advice->postTime = $row['postTime'];
			$advice->recived = $row['recived'];
			$advice->inner = $row['inner'];
			$advices[] = $advice;
		}
		return $advices;
	}

	public function checkAdvice() {

	}
	

	public function close() {
		$this->dbController->close();
	}
}





?>