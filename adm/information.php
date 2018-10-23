<header style="border: 4px double black;">
	<div style="vertical-align: middle; display: inline-block; padding-left: 10px;">
		<a href="/pr/adm/index.php?route1=start"><H3>Категории            </H3></a>
	</div>
	<div style="vertical-align: middle; display: inline-block; padding-left: 10px;"">
		<a href="/pr/adm/index.php?route1=news"><H3>Новости            </H3></a>
	</div>
	<div style="vertical-align: middle; display: inline-block; padding-left: 10px;"">
		<a href="/pr/adm/index.php?route1=information"><H3>Информация            </H3></a>
	</div>
</header>
<?php
if(!empty($_SESSION['t'])) {
	$_GET['page'] = $_SESSION['page'];
	unset($_SESSION['t']);
}
if(empty($_GET['page'])){
	$sql = "SELECT * FROM information LIMIT 0, 10";
	$query = mysqli_query($connect, $sql);
	while($res[] = mysqli_fetch_assoc($query)){
	$text = $res;
}
} else{
$sql = "SELECT * FROM information LIMIT " . ($_GET['page']-1)*10 . ", 10";
//var_dump($sql);
$query = mysqli_query($connect, $sql);
while($res[] = mysqli_fetch_assoc($query)){
	$text = $res;
}
}
//var_dump($text);
//unset($_SESSION['page']);
$_SESSION['TEXT'] = $text;
echo "<form action='/pr/adm/formi.php' method='post'><br>";
$_SESSION['page'] = $_GET['page'];
echo "<table border='1'>
		<tr>
		<td>Infomation_name </td>
		<td>Title</td>
		<td>Meta_description</td>
		<td>Category_description</td>
		<td>Выбор</td>
	 </tr>";
foreach ($text as $key) {
	//if ($_SESSION['id'] == $key['name_id']){
		echo "<tr><td>  <input type='text' name='information_name" . $key['information_id'] . "'  value='" . $key['information_name'] . "'/></td>
			<td><input type='text' name='title" . $key['information_id'] . "'  value='" . $key['title'] . "'/></td>
			<td><input type='text' name='meta_description" . $key['information_id'] . "'  value='" . $key['meta_description'] . "'/></td>
			<td><input type='text' name='categoty_description" . $key['information_id'] . "'  value='" . $key['categoty_description'] . "'/></td>
			<td><input type='checkbox' name='a[]' value='" . $key['information_id'] . "'></td>
			</tr>";
		
}
echo "</table>";
echo "<br><br>";
$k = mysqli_query($connect, "SELECT COUNT(*) FROM information");
$kol = mysqli_fetch_assoc($k);
for($i=1; $i <= ((int)(($kol["COUNT(*)"]-1)/10)+1); $i++){
	echo "<a href='/pr/adm/index.php?route1=information&page=" . $i . "'>" . ' ' . $i . ' ' . "</a>";
}
echo "<br><br>Выберите запись для удаления";
echo "<br><br><input type='checkbox' name='b' value=1>Выберите checkbox для вставки новой записи";
echo "<br><br><input type='submit' value='Send' />";
echo "</form>";
?>
<form>
<input type="button" value="Выход" onClick='location.href="/pr/adm/"'>
</form>