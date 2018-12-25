<?php
class ChangePasswordForm extends AbstractView
{
    public function getHtml()
    {
        ?>
<form class="form-inline my-2 ml-2 my-lg-0" id="changePasswordForm" action="index.php" method="GET">
	<input type="hidden" name="page" value="ChangePassword" />
	<button class="btn btn-sm btn-warning my-2 my-sm-0" type="submit">Change Password</button>
</form>
<?php
    }
}
