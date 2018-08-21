<?php
class TableCellView extends Element {

    protected function render(){
        ?>
        <div class="col-<?php echo $this->getSpan(); ?>">
        <?php echo $this->renderChildren(); ?>
        </div>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
