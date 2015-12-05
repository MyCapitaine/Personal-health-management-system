
function ignoreInput() {
	document.getElementById('dataYear').value = "";
	document.getElementById('dataMonth').value = "";
	document.getElementById('dataDay').value = "";
	document.getElementById('dataHour').value = "";
	document.getElementById('dataSportsTime').value = "";
	document.getElementById('dataRestTime').value = "";
	document.getElementById('dataAvgHeartRate').value = "";
	document.getElementById('dataAvgBloodPressure').value = "";

}

function makeFormAction() {
	document.getElementById('personalDataAdd').action = 
		"/Personal-health-management-system/userData" +
		"/" + document.getElementById('personalDataAddUid').value +
		"/" + document.getElementById('dataYear').value +
		"/" + document.getElementById('dataMonth').value +
		"/" + document.getElementById('dataDay').value +
		"/" + document.getElementById('dataHour').value;

}