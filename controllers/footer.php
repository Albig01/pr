<?php
//session_start();
$sql = "SELECT * FROM categories";
	$query = mysqli_query($connect, $sql);
	while($res1[] = mysqli_fetch_assoc($query)){
		$mass1 = $res1;
	}
	foreach ($mass1 as $n) {
		$data1['cat'][] = array(
			'id' => $n['category_id'],
			'name' => $n['category_name']
		);
	}
	getFooter($data1);
	//var_dump($data1); exit;
?>