<?php
class TitleView extends ElementView {

    protected function render(){
        ?>
        <h<?php echo $this->element->getLevel(); ?> id="title-<?php echo $this->element->getId(); ?>"><?php echo $this->element->getContent(); ?></h<?php echo $this->element->getLevel(); ?>>
        <?php
    }
    

    protected function renderOutline(){
        ?>
        <a class="nav-link ml-4" href="#title-<?php echo $this->element->getId(); ?>"><?php echo $this->element->getContent(); ?></a>
        <?php
    }
}
