<?php
$error = "";
$log = "";
if(empty($_COOKIE['user'])) toErrorPage();
$url = '/Personal-health-management-system/view/';
switch ($_COOKIE['userType']) {
	case 'coach':
		$url = $url.'Coach.php';
		break;
	case 'doctor':
		$url = $url.'Doctor.php';
		break;
	default:
		toErrorPage();
		break;
}

if($_FILES['adviceFile']['size'] == 0) toErrorPage();

require_once('../controller/UserController.php');
require_once('../controller/AdviceController.php');
$userController = new UserController();
$adviceController = new AdviceController();
$seekBuffer = array();
$posterId = seekUid($_COOKIE['user']);

$xmlDoc = new DOMDocument();
$xmlDoc->load($_FILES['adviceFile']['tmp_name']);
$elements = $xmlDoc->documentElement;

if(sizeof($elements) == 0) {
	echo ($error = $error."<p>cant read as xml</p>\n");
	exit;
}

$infos = array();
$reciverIds = array();
foreach ($elements->childNodes as $element) {
	if($element->nodeName == 'advice') {
		foreach ($element->childNodes as $attr) {
			if($attr->nodeName == 'name') {
				$reciverIds[] = seekUid($attr->nodeValue);
			}
			else if($attr->nodeName == 'text') {
				$infos[] = $attr->nodeValue;
			}
			else if($attr->nodeName != '#text') {
				$error = $error."<p>xml error</p>\n";
				break 2;
			}
		}
	}
	else if($element->nodeName != '#text') {
		$error = $error."<p>xml error</p>\n";
		break;
	}
}

if($error == "") {
	if($adviceController->makeAdvices($posterId, $reciverIds, $infos))
		$log = "post success";
	else
		$log = "post fail";
	echo $log;

	header("refresh:0.3;url=$url");
}
else echo $error;

$userController->close();
$adviceController->close();


function seekUid($name) {
	global $userController, $seekBuffer;
	if(isset($seekBuffer[$name])) return $seekBuffer[$name];
	$uid = $userController->getUser($name)->uid;
	return ($seekBuffer[$name] = $uid);
}

function toErrorPage() {
	header('refresh:0;url=/Personal-health-management-system/view/error.php');
	exit;
}

?>