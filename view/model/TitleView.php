<?php
class TitleView extends ElementView {

    protected function render(){
        ?>
        <h<?php echo $this->getElement()->getLevel(); ?>><?php echo $this->getElement()->getContent(); ?></h<?php echo $this->getElement()->getLevel(); ?>>
        <?php
    }
    

    protected function renderOutline(){
        ?>
        <a class="nav-link" href="#title-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <?php
    }
}
