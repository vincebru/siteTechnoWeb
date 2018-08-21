<?php
class ImageView extends Element {

    protected function render(){
        ?>
        <img src="<? echo $this->element.getContent(); ?>" width="<? echo $this->element.getWidth(); ?>" height="<? echo $this->element.getHeight(); ?>" alt="<? echo $this->element.getTitle(); ?>" />
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
