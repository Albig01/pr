<?php
session_start();
require_once $$_SERVER['DOCUMENT_ROOT'] . "/config.php";
$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	mysqli_query($connect, "SET CHARSET UTF8");
$sql = "SELECT * FROM users";
$query = mysqli_query($connect, $sql);
while($res[] = mysqli_fetch_assoc($query)){
	$users = $res;
}
foreach ($users as $key) {
	$log[] = $key['user_name'];
	$passw[] = $key['password'];
}
$f = 0;
//var_dump($log); exit();
if(!empty($_POST['login']) && in_array(trim($_POST['login']), $log)){
	$f=1;
	$_SESSION['login'] = trim($_POST['login']);
	unset($_SESSION['error_login']);
} else{
	$_SESSION['error_login'] = 1;
	unset($_SESSION['login']);
}

if(!empty($_POST['password']) && trim($_POST['password']) == $passw[array_search($_SESSION['login'], $log)] && $f){
	$_SESSION['password'] = trim($_POST['password']);
	unset($_SESSION['error_password']);
	header('Location: /pr/adm/index.php?route1=start');
	exit;
} else{
	$_SESSION['error_password'] = 1;
	unset($_SESSION['password']);
}
unset($_GET['route1']);
header('Location: /pr/adm/');
exit;
?>