<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<link rel="stylesheet" type="text/css" href="views/style/style.css">
</head>
<body style="background-image: url(<?php echo $$_SERVER['DOCUMENT_ROOT'] . 'image/3.jpg';?>);">
<?php
//session_start();
if(!empty($_GET['news_id'])){
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/controllers/header.php";
	$sql = "SELECT * FROM news WHERE news_id =" . $_GET['news_id'];
	$query = mysqli_query($connect, $sql);
	while($res[] = mysqli_fetch_assoc($query)){
		$mass = $res;
	}
	$data['title'] = 'value';
	foreach ($mass as $m) {
		$data['news'][] = array(
			'text' => $m['description'],
			'image' => $m['news_image'],
			'date' => $m['date'],
			'sh_des' => $m['short_description']
		);
	}
	getview('news', $data);
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/views/footer.php";
}else {}
?>
</body>
</html>