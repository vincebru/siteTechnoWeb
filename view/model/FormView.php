<?php
class FormView extends Element {

    protected function render(){
        ?>
        <form action="<?php echo $this->getContent(); ?>" method="post">
        <?php echo $this->renderChildren(); ?>
        </form>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
