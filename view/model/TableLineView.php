<?php
class TableLineView extends Element {

    protected function render(){
        ?>
        <div class="row">
        <?php echo $this->renderChildren(); ?>
        </div>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
