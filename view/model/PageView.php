<?php
class PageView extends ElementView {

    protected function render(){
        ?>
        <div class="container">
        <p id="#page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></p>
        <?php echo $this->renderChildren(); ?>
        </div>
        <?php
    }

    protected function renderOutline(){
        ?>
        <a class="nav-link ml-3 my-1" href="#page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <nav class="nav nav-pills flex-column">
        <?php echo $this->renderChildrenOutline(); ?>
        </nav>
        <?php
    }
}
