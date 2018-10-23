<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'mysql', 'project');
mysqli_set_charset($connect, "utf8");
$_SESSION['t'] = '1';
if(!empty($_POST['a'])){
	foreach($_POST['a'] as $del){
		$sql = "DELETE FROM news WHERE news_id=" . $del;
		mysqli_query($connect, $sql);
	}
	$k = mysqli_query($connect, "SELECT COUNT(*) FROM news");
	$kol = mysqli_fetch_assoc($k);
	$_SESSION['page'] = ((int)(($kol["COUNT(*)"]-1)/10)+1);
}else{
	foreach ($_SESSION['TEXT'] as $key) {
		$sql2 = "UPDATE news SET category_id = '" . $_POST['category_id' . $key['news_id']] . "', 
				news_name = '" . $_POST['news_name' . $key['news_id']] . "',
				description = '" . $_POST['description' . $key['news_id']] . "',
				short_description = '" . $_POST['short_description' . $key['news_id']] . "',
				news_image = '" . $_POST['news_image' . $key['news_id']] . "',
				date = '" . $_POST['date' . $key['news_id']] . "' WHERE news_id=" . 
				$key['news_id'];
				//var_dump($sql2); exit;
		mysqli_query($connect, $sql2);
	}
	
}

if(!empty($_POST['b'])){
	$sql1= "INSERT INTO news SET description = 'Введите новость'";
	mysqli_query($connect, $sql1);
//	unset($_SESSION['error_postb']);
	$k = mysqli_query($connect, "SELECT COUNT(*) FROM news");
	$kol = mysqli_fetch_assoc($k);
	$_SESSION['page'] = ((int)(($kol["COUNT(*)"]-1)/10)+1);
} else{
		
}
var_dump($_SESSION['page']);
header('Location: /pr/adm/index.php?route1=news');
exit;
?>