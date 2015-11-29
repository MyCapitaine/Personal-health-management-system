<?php
	interface Model {
		public function createTable(& $dbController);
		public function dropTable(& $dbController);
		public function resetTable(& $dbController);
	}
?>