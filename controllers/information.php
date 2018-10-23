<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
	<link rel="stylesheet" type="text/css" href="views/style/style.css">
</head>
<body style="background-image: url(<?php echo $$_SERVER['DOCUMENT_ROOT'] . 'image/3.jpg';?>);">
<?php
if(!empty($_GET['information_id'])){
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/controllers/header.php";
	if($_GET['information_id'] == 3){
		$sql = "SELECT * FROM information WHERE information_id = 3";
	} else {
		$sql = "SELECT * FROM information WHERE information_id != 3";
	}
	$query = mysqli_query($connect, $sql);
	while($res[] = mysqli_fetch_assoc($query)){
		$mass = $res;
	}
	$data['title'] = 'Информация';
	foreach ($mass as $m) {
		$data['news'][] = array(
			'name' => $m['title'],
			'sh_des' => $m['categoty_description']
		);
	}
	getview('information', $data);
	require_once $$_SERVER['DOCUMENT_ROOT'] . "/views/footer.php";
}
?>
</body>
</html>