<?php
require_once('DbController.php');
class QuestionController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}
	
	public function makeQuestion($posterId, $reciverId, $info) {
		$command = "insert into QUESTIONS values(".$posterId.",".$reciverId.",".time().",0,'".$info."');";
		return $this->dbController->exec($command);
	}

	public function posterGetQuestions($posterId) {
		$command = "select * from QUESTIONS where posterId = ".$posterId.";";
		$result = $this->dbController->query($command);
		$questions = array();
		while($row = $result->fetchArray()) {
			$question = new Questions();
			$question->posterId = $row['posterId'];
			$question->reciverId = $row['reciverId'];
			$question->postTime = $row['postTime'];
			$question->recived = $row['recived'];
			$question->inner = $row['inner'];
			$questions[] = $question;
		}
		return $questions;
	}

	public function reciverGetQuestions($reciverId) {
		$command = "select * from QUESTIONS where reciverId = ".$reciverId.";";
		$result = $this->dbController->query($command);
		$questions = array();
		while($row = $result->fetchArray()) {
			$question = new Questions();
			$question->posterId = $row['posterId'];
			$question->reciverId = $row['reciverId'];
			$question->postTime = $row['postTime'];
			$question->recived = $row['recived'];
			$question->inner = $row['inner'];
			$questions[] = $question;
		}
		return $questions;
	}

	public function checkQuestion() {
		
	}

	public function close() {
		$this->dbController->close();
	}
}





?>