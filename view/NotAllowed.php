<?php
class NotAllowed extends AbstractView {
    public function getHtml(){
    ?>
    <div class="container">
        <p>
            You are not allowed to access to this page. <br />
            Please contact administrator to have the access to this page.
        </p>
    </div>
<?php
    }
}