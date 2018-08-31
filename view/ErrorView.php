<?php
class ErrorView extends AbstractView {
    public function getHtml(){
    ?>
    <div class="container mt-3">
        <p>
            An error happened : <b><?php echo $this->args["errorMessage"]; ?></b>
            <div class="container">
            <?php
            if (array_key_exists("stack", $this->args)){
                foreach ($this->args["stack"] as $entry_id => $entry) { 
            ?>
                <div class="row">
                    <div class="col-12"><?php echo $entry['file']; ?>(<?php echo $entry['line']; ?>)</div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10"><?php echo array_key_exists("class", $entry) ? $entry['class'] : ""; ?><?php echo array_key_exists("type", $entry) ? $entry['type'] : "::"; ?><?php echo $entry['function']; ?>()</div>
                </div>
                <?php
                    if (count($entry['args']) > 0){
                        foreach ($entry['args'] as $arg_id => $arg) { 
                        ?>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4"><?php echo $arg_id; ?></div>
                    <div class="col-4"><?php echo $arg[$arg_id]; ?></div>
                </div>
                        <?php 
                        }
                    } 
                } 
            } ?>
            </div>
        </p>
    </div>
<?php  }
}
?>