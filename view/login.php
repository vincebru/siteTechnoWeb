<?php 
if(isset($loginMessage) && $loginMessage!=""){
	echo('<div class="errorMessage">'.$loginMessage.'</div>');
}
?>

<form id="loginForm" action="index.php?page=login" method="POST">
	<input type="text" name="login" placeholder="login"  value="<?php echo(isset($login)?$login:"")?>"/>
	<input type="password" name="password" placeholder="password" />
	<input type="submit" value="Login" />
</form>
<a id="newLogin" href="index.php?page=newAccount">Create account</a>