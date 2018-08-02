	<?php 
	logDebug("load new account view");
	if (isset($message)){
		echo('<div class="errorMessage">'.$message.'</div>');
	}
?>
	<form id="createAccountForm" action="index.php?page=addAccount" method="POST">
		<input type="text" name="login" placeholder="login" value="<?php echo(isset($login)?$login:"")?>" />
		<input type="password" name="password" placeholder="password" />
		<input type="text" name="firstname" placeholder="firstname"  value="<?php echo(isset($firstname)?$firstname:"")?>" />
		<input type="text" name="lastname" placeholder="lastname"  value="<?php echo(isset($lastname)?$lastname:"")?>" />
		<input type="text" name="email" placeholder="email"  value="<?php echo(isset($email)?$email:"")?>" />
		<input type="submit" value="Create" />
	</form>