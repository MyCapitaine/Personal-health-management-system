
<?php
	// var a = 100
	class AAA {
		public function __construct() {
			echo "construct\n";
		}

		public function aF() {
			echo "aF";
		}
	}
	$a = new AAA();
	$a->aF();
	$a = 100;
	echo '<h1>fsgrhhr'.$a.'</h1>';

?>

