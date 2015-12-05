<?php
$userName = 'Normal03';
$year = 2013; $month = 1; $day = 1; $hour = 1;
$dayCount = 2;

$text = "";
$text = $text."<?xml version='1.0' encoding='ISO-8859-1'?>\n";
$text = $text."<datas userName='$userName'>\n";
for(;$day <= $dayCount;) {
	$sportsTime = rand(0, 60);
	$restTime = rand(0, 60 - $sportsTime);
	$avgHeartRate = rand(60.0, 100.0);
	$avgBloodPressure = rand(100.0, 130.0);
	$text = $text."	<data>\n";
	$text = $text."		<year>$year</year>\n";
	$text = $text."		<month>$month</month>\n";
	$text = $text."		<day>$day</day>\n";
	$text = $text."		<hour>$hour</hour>\n";
	$text = $text."		<sportsTime>$sportsTime</sportsTime>\n";
	$text = $text."		<restTime>$restTime</restTime>\n";
	$text = $text."		<avgHeartRate>$avgHeartRate</avgHeartRate>\n";
	$text = $text."		<avgBloodPressure>$avgBloodPressure</avgBloodPressure>\n";
	$text = $text."	</data>\n";

	if(++ $hour >= 24) {
		$hour = 1;
		$day ++;
	}
}
$text = $text."</datas>\n";
file_put_contents("testDatas.xml", $text);
?>



