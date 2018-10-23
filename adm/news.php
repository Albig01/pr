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
$_SESSION['page'] = $_GET['page'];
//var_dump($_SESSION['page']); 
if(empty($_GET['page'])){
	$sql = "SELECT * FROM news LIMIT 0, 10";
	$query = mysqli_query($connect, $sql);
	while($res[] = mysqli_fetch_assoc($query)){
	$text = $res;
}
} else{
$sql = "SELECT * FROM news LIMIT " . ($_GET['page']-1)*10 . ", 10";
$query = mysqli_query($connect, $sql);
while($res[] = mysqli_fetch_assoc($query)){
	$text = $res;
}
}
//var_dump($text);
//unset($_SESSION['page']);
$_SESSION['TEXT'] = $text;
echo "<form action='/pr/adm/formn.php' method='post'><br>";
echo "<table  border='1'>
		<tr>
		<td>Category_id</td>
		<td>News_name</td>
		<td>Description</td>
		<td>Short_description</td>
		<td>News_image</td>
		<td>Date</td>
		<td>Выбор</td>
	 </tr>";
foreach ($text as $key) {
	//if ($_SESSION['id'] == $key['name_id']){
		echo "<tr><td>  <input type='text' name='category_id" . $key['news_id'] . "'  value='" . $key['category_id'] . "'/></td>
			<td><input type='text' name='news_name" . $key['news_id'] . "'  value='" . $key['news_name'] . "'/></td>
			<td><textarea rows='3' cols='45' name='description" . $key['news_id'] . "'>" . $key['description'] . "</textarea></td>
			<td><input type='text' name='short_description" . $key['news_id'] . "'  value='" . $key['short_description'] . "'/></td>
			<td><input type='text' name='news_image" . $key['news_id'] . "'  value='" . $key['news_image'] . "'/></td>
			<td><input type='text' name='date" . $key['news_id'] . "'  value='" . $key['date'] . "'/></td>
			<td><input type='checkbox' name='a[]' value='" . $key['news_id'] . "'></td>
			</tr>";
		
}
echo "</table>";
echo "<br><br>";
$k = mysqli_query($connect, "SELECT COUNT(*) FROM news");
$kol = mysqli_fetch_assoc($k);
for($i=1; $i <= ((int)(($kol["COUNT(*)"]-1)/10)+1); $i++){
	echo "<a href='/pr/adm/index.php?route1=news&page=" . $i . "'>" . ' ' . $i . ' ' . "</a>";
}
echo "<br><br>Выберите запись для удаления";
echo "<br><br><input type='checkbox' name='b' value=1>Выберите checkbox для вставки новой записи";
echo "<br><br><input type='submit' value='Send' />";
echo "</form>";
?>
<form>
<input type="button" value="Выход" onClick='location.href="/pr/adm/"'>
</form>