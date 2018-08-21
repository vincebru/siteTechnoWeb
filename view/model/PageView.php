<?php
class PageView extends Element {

    protected function render(){
        ?>
        <div class="container">
        <?php echo $this->renderChildren(); ?>
        </div>
        <?php
    }

    protected function renderOutline(){
        ?>
        <a class="nav-link" href="#page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getTitle(); ?></a>
        <?php
        renderChildrenOutline();
    }
}
