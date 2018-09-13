<?php
class ChangePasswordView extends AbstractView
{
    public function getHtml()
    {
        logDebug('load change password view'); ?>
	<div class="container mt-3">
	<form id="updatePasswordForm" action="index.php" method="POST">
		<input type="hidden" name="page" value="UpdatePassword" />
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Old password</label>
			<div class="col-sm-10">
				<input type="password" id="oldPassword" name="oldPassword" class="form-control" placeholder="password" />
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">New password</label>
			<div class="col-sm-10">
				<input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="password" />
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Confirm password</label>
			<div class="col-sm-10">
				<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="password" />
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Update</button>
				<button type="button" class="btn btn-warning" onclick="location.href='index.php';">Cancel</button>
			</div>
		</div>
	</form>
	</div>
	<?php
    }
}
