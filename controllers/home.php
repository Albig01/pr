<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="views/style/style.css">
</head>
<body style="background-image: url(<?php echo $$_SERVER['DOCUMENT_ROOT'] . 'image/3.jpg';?>);">
<?php
//session_start();
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/controllers/header.php";
	$sql = "SELECT * FROM categories";
	$query = mysqli_query($connect, $sql);
	while($res[] = mysqli_fetch_assoc($query)){
		$mass1 = $res;
	}
	foreach($mass1 as $n){
		$sql1 = "SELECT * FROM news WHERE category_id =" . $n['category_id'] . " ORDER BY news_id DESC LIMIT 5";
		//var_dump($sql1); exit;
		$query1 = mysqli_query($connect, $sql1);
		while($a[] = mysqli_fetch_assoc($query1)){
			$mass = $a;
		}
		unset($a);
		//var_dump($mass); exit;
		//$data['title'] = 'value';
		foreach ($mass as $m) {
			$data[$n['category_name']][] = array(
				//'name' => $n['category_name'],
				'link' => 'index.php?route=news&news_id=' . $m['news_id'],
				'image' => $m['news_image'],
				'date' => $m['date'],
				'sh_des' => $m['short_description']
			);
		}
	}
	getview('home', $data);
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/views/footer.php";
?>
</body>
</html>