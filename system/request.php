<?php

function getView($name, $data = ''){
	return require_once $_SERVER['DOCUMENT_ROOT'] . "/pr/views/" . $name . ".php";
}

function getHeader($data1 = ''){
	return require_once $_SERVER['DOCUMENT_ROOT'] . "/pr/views/header.php";
}

function getFooter($data1 = ''){
	return require_once $_SERVER['DOCUMENT_ROOT'] . "/pr/views/footer.php";
}

function mylink($name, $id){
	return '/pr/index.php?route=' . $name . '&' . $name . '_id=' . $id;
}
?>