<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'mysql', 'project');
mysqli_set_charset($connect, "utf8");
$_SESSION['t'] = '1';
if(!empty($_POST['a'])){
	foreach($_POST['a'] as $del){
		$sql = "DELETE FROM information WHERE information_id=" . $del;
		mysqli_query($connect, $sql);
	}
	$k = mysqli_query($connect, "SELECT COUNT(*) FROM information");
	$kol = mysqli_fetch_assoc($k);
	$_SESSION['page'] = ((int)(($kol["COUNT(*)"]-1)/10)+1);
}else{
	foreach ($_SESSION['TEXT'] as $key) {
		$sql2 = "UPDATE information SET information_name = '" . $_POST['information_name' . $key['information_id']] . "', 
				title = '" . $_POST['title' . $key['information_id']] . "',
				meta_description = '" . $_POST['meta_description' . $key['information_id']] . "',
				categoty_description = '" . $_POST['categoty_description' . $key['information_id']] . "' WHERE information_id=" . 
				$key['information_id'];
				//var_dump($sql2); exit;
		mysqli_query($connect, $sql2);
	}
}

if(!empty($_POST['b'])){
	$sql1= "INSERT INTO information SET title = 'Введите информацию'";
	mysqli_query($connect, $sql1);
//	unset($_SESSION['error_postb']);
	$k = mysqli_query($connect, "SELECT COUNT(*) FROM information");
	$kol = mysqli_fetch_assoc($k);
	$_SESSION['page'] = ((int)(($kol["COUNT(*)"]-1)/10)+1);
} else{
		
}

header('Location: /pr/adm/index.php?route1=information');
exit;
?>