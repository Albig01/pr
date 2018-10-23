<?php
session_start();
if(!empty($_GET['route1'])){
	$filename = $_SERVER['DOCUMENT_ROOT'] . "/pr/adm/" . $_GET['route1'] . ".php";
}
require_once $$_SERVER['DOCUMENT_ROOT'] . "/config.php";
$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	mysqli_query($connect, "SET CHARSET UTF8");
if($_SERVER['REQUEST_URI'] == '/pr/adm/'){
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/login.php";
} elseif(!empty($filename) && file_exists($filename)){
	require_once $filename;
} else{
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/controllers/404.php";
}
//index.php?route=category&category_id=2*/
?>