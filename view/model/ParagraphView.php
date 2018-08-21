<?php
class ParagraphView extends Element {

    protected function render(){
        ?>
        <p>
        <?php echo $this->renderChildren(); ?>
        </p>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
