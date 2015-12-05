<?php
$uid = array_reverse(explode('/', $_SERVER['REQUEST_URI']))[0];

require_once('../controller/DataController.php');
$dataController = new DataController();
$datas = $dataController->getDatas($uid, null, null);
$dataController->close();

echo "<h1>USER DATAS</h1>\n";
echo "<ul>\n";	
foreach ($datas as $data) {
	echo "	<li>\n";
	echo "		<form>\n";
	echo "		".date("Y-m-d-H", $data->time).":[ ";
	echo "sportsTime:$data->sportsTime; ";
	echo "restTime:$data->restTime; ";
	echo "avgHeartRate:$data->avgHeartRate; ";
	echo "avgBloodPressure:$data->avgBloodPressure ]\n";
	echo "		</form>\n";
	echo "	</li>\n";
}
echo "</ul>\n";


?>