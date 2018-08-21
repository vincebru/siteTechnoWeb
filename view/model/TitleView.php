<?php
class TitleView extends Element {

    protected function render(){
        ?>
        <h<? echo $this->element.getLevel(); ?>><? echo $this->element.getContent(); ?></h<? echo $this->element.getLevel(); ?>>
        <?php
    }
    

    protected function renderOutline(){
        ?>
        <a class="nav-link" href="#title-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getTitle(); ?></a>
        <?php
    }
}
