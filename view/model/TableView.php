<?php
class TableView extends Element {

    protected function render(){
        ?>
        <div class="container-fluid">
        <?php echo $this->renderChildren(); ?>
        </div>
        <?php
    }

    protected function renderOutline(){
       return "";
    }
}
