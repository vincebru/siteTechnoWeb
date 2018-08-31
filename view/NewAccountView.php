<?php
class NewAccountView extends AbstractView
{
    public function getHtml()
    {
        logDebug('load new account view');
        if (isset($message)) {
            echo '<div class="errorMessage">'.$message.'</div>';
        } ?>
	<div class="container mt-3">
	<form id="createAccountForm" action="index.php" method="POST">
		<input type="hidden" name="page" value="AddAccount" />
		<div class="form-group row">
			<label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
			<div class="col-sm-10">
				<input type="text" id="inputLogin" name="login" class="form-control" placeholder="login" value="<?php echo isset($login) ? $login : ''; ?>" />
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="password" />
			</div>
		</div>
		<div class="form-group row">
			<label for="inputFirstName" class="col-sm-2 col-form-label">Fist name</label>
			<div class="col-sm-10">
				<input type="text" id="inputFirstName" name="firstname" class="form-control" placeholder="firstname"  value="<?php echo isset($firstname) ? $firstname : ''; ?>" />
			</div>
		</div>
		<div class="form-group row">
			<label for="inputLastName" class="col-sm-2 col-form-label">Last name</label>
			<div class="col-sm-10">
				<input type="text" id="inputLastName" name="lastname" class="form-control" placeholder="lastname"  value="<?php echo isset($lastname) ? $lastname : ''; ?>" />
			</div>
		</div>
		<div class="form-group row">
			<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" id="inputEmail" name="email" class="form-control" placeholder="email"  value="<?php echo isset($email) ? $email : ''; ?>" />
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Create</button>
				<button type="button" class="btn btn-warning" onclick="location.href='index.php';">Cancel</button>
			</div>
		</div>
	</form>
	</div>
	<?php
    }
}
