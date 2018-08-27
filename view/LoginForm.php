<?php
class LoginForm extends AbstractView {
    public function getHtml(){
if(isset($loginMessage) && $loginMessage!=""){
	echo('<div class="errorMessage">'.$loginMessage.'</div>');
}
?>

<form class="form-inline my-2 my-lg-0" id="loginForm" action="index.php" method="POST">
	<input type="hidden" name="page" value="login" />
	<input class="form-control form-control-sm mr-sm-2" type="text" name="login" autocomplete="username" placeholder="login" aria-label="login" value="<?php echo(isset($login)?$login:"")?>"/>
	<input class="form-control form-control-sm mr-sm-2" type="password" name="password" autocomplete="current-password" placeholder="password" />
	<button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" value="Login">Login</button>
</form>
<?php
    }
}