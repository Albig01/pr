<style type="text/css">
form { display: inline-block; border: 2px solid black; }
</style>

<form action="/pr/adm/formt.php" method="post">
<input type="text" name="login" placeholder="Login"  value="
<?php echo !empty($_SESSION['login']) ? $_SESSION['login'] : ''; ?>" />
<br/>

<input type="password" name="password" placeholder="Password" 
value="<?php echo !empty($_SESSION['password']) ? $_SESSION['password'] : ''; ?>" />
<br/>
<input type="submit" value="Send" />
<?php if(!empty($_SESSION['error_login']) || !empty($_SESSION['error_password'])){
	echo '<span style="color: red;">' .'Неправильно введен логин или пароль' .'</span>';
} ?>
</form>
