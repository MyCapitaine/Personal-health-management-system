

function ignoreInput() {
	document.getElementById("personal_management_infomation").value = "";
	document.getElementById("personal_management_oldPassword").value = "";
	document.getElementById("personal_management_newPassword").value = "";
}

function hidPassword() {
	var oldPassword = document.getElementById('input_oldPassword').value;
	if(oldPassword != "") document.getElementById('personal_management_oldPassword').value = hex_md5(hex_md5(oldPassword));
	document.getElementById('input_oldPassword').value = "";
}

