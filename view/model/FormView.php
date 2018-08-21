<?php
class FormView extends ElementView {

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
