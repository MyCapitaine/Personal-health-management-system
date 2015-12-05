
function hidPassword() {

	var password = document.getElementById('inputPassword').value;
	if(password != "") document.getElementById('loginPassword').value = hex_md5(hex_md5(password));
	document.getElementById('inputPassword').value = "";

}

