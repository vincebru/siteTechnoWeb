<?php
class LinkView extends Element {

    protected function render(){
        ?>
        <a href="<? echo $this->element.getContent(); ?>"><? echo $this->element.getLabel(); ?></a>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
