<?php
class LinkView extends ElementView {

    protected function render(){
        ?>
        <a href="<? echo $this->element.getContent(); ?>"><? echo $this->element.getLabel(); ?></a>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
