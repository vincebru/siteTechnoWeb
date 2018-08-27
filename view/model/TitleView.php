<?php
class TitleView extends ElementView {

    protected function render(){
        ?>
        <h<?php echo $this->element->getLevel(); ?>><?php echo $this->element->getContent(); ?></h<?php echo $this->element->getLevel(); ?>>
        <?php
    }
    

    protected function renderOutline(){
        ?>
        <a class="nav-link" href="#title-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <?php
    }
}
