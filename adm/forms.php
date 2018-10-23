<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'mysql', 'project');
mysqli_set_charset($connect, "utf8");
$_SESSION['t'] = '1';
if(!empty($_POST['a'])){
	foreach($_POST['a'] as $del){
		$sql = "DELETE FROM categories WHERE category_id=" . $del;
		mysqli_query($connect, $sql);
	}
	$k = mysqli_query($connect, "SELECT COUNT(*) FROM categories");
	$kol = mysqli_fetch_assoc($k);
	$_SESSION['page'] = ((int)(($kol["COUNT(*)"]-1)/10)+1);
}else{
	foreach ($_SESSION['TEXT'] as $key) {
		$sql2 = "UPDATE categories SET category_name = '" . $_POST['category_name' . $key['category_id']] . "', 
				category_image = '" . $_POST['category_image' . $key['category_id']] . "',
				title = '" . $_POST['title' . $key['category_id']] . "',
				meta_description = '" . $_POST['meta_description' . $key['category_id']] . "',
				category_description = '" . $_POST['category_description' . $key['category_id']] . "' WHERE category_id=" . 
				$key['category_id'];
				//var_dump($sql2); exit;
		mysqli_query($connect, $sql2);
	}
}

if(!empty($_POST['b'])){
	$sql1= "INSERT INTO categories SET category_name = 'Введите заголовок'";
	mysqli_query($connect, $sql1);
//	unset($_SESSION['error_postb']);
	$k = mysqli_query($connect, "SELECT COUNT(*) FROM categories");
	$kol = mysqli_fetch_assoc($k);
	$_SESSION['page'] = ((int)(($kol["COUNT(*)"]-1)/10)+1);
} else{
		
}

header('Location: /pr/adm/index.php?route1=start');
exit;
?>