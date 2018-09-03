<?php
class TableView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="container-fluid">
        <?php echo $this->renderChildren(); ?>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
