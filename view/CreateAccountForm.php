<?php
class CreateAccountForm extends AbstractView {
    public function getHtml(){
    ?>
	<form class="form-inline my-2 mr-2 my-lg-0" id="createAccountForm" action="index.php" method="GET">
		<input type="hidden" name="page" value="NewAccountView" />
		<button class="btn btn-sm btn-success my-2 my-sm-0" type="submit">Create account</button>
	</form>
<?php
    }
}