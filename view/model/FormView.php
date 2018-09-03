<?php
class FormView extends ElementView
{
    public function render()
    {
        ?>
        <form action="<?php echo $this->element->getContent(); ?>" method="post">
        <?php echo $this->renderChildren(); ?>
        </form>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
