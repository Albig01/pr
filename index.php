<?php
session_start();
if(!empty($_GET['route'])){
	$filename = $_SERVER['DOCUMENT_ROOT'] . "/pr/controllers/" . $_GET['route'] . ".php";
}
require_once $$_SERVER['DOCUMENT_ROOT'] . "/config.php";
require_once $$_SERVER['DOCUMENT_ROOT'] . "/system/request.php";

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	mysqli_query($connect, "SET CHARSET UTF8");

	
if($_SERVER['REQUEST_URI'] == '/pr/'){
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/controllers/home.php";
} elseif(!empty($filename) && file_exists($filename)){
	require_once $filename;
} else{
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/controllers/404.php";
}
/*site.loc/index.php?route=category&category_id=2*/
?>
