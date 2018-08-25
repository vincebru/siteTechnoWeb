<?php
class Error extends AbstractView {
    public function getHtml(){
    ?>
    <div class="container">
        <p>
            An error happened : <b><?php echo $this->args["errorMessage"]; ?></b>

        </p>
    </div>
<?php  }
}
?>