<?php
class PageView extends ElementView {

    protected function render(){
        ?>
        <div class="container">
        <?php echo $this->renderChildren(); ?>
        </div>
        <?php
    }

    protected function renderOutline(){
        ?>
        <a class="nav-link" href="#page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <?php
        $this->renderChildrenOutline();
    }
}
