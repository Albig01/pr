<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="views/style/style.css">
</head>
<body style="background-image: url(<?php echo $$_SERVER['DOCUMENT_ROOT'] . 'image/3.jpg';?>);">
<?php
//session_start();
if(!empty($_GET['category_id'])){
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/controllers/header.php";
	$sql = "SELECT * FROM news WHERE category_id =" . $_GET['category_id'] . " ORDER BY news_id DESC";
	$query = mysqli_query($connect, $sql);
	while($res[] = mysqli_fetch_assoc($query)){
		$mass = $res;
	}
	$data['title'] = mysqli_fetch_assoc(mysqli_query($connect, "SELECT category_name FROM categories WHERE category_id =" . $_GET['category_id']))['category_name'];
	foreach ($mass as $m) {
		$data['news'][] = array(
			'name' => $m['news_name'],
			'link' => 'index.php?route=news&news_id=' . $m['news_id'],
			'image' => $m['news_image'],
			'date' => $m['date'],
			'sh_des' => $m['short_description']
		);
	}
	getview('category', $data);
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/views/footer.php";
}else {}
?>
</body>
</html>

