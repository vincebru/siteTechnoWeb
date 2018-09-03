<?php
class LogoutForm extends AbstractView
{
    public function getHtml()
    {
        ?>
<form class="form-inline my-2 ml-2 my-lg-0" id="loginForm" action="index.php" method="GET">
	<input type="hidden" name="page" value="disconnect" />
	<button class="btn btn-sm btn-warning my-2 my-sm-0" type="submit">Disconnect</button>
</form>
<?php
    }
}
