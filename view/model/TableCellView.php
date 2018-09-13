<?php
class TableCellView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="col-<?php echo $this->getSpan(); ?>">
        <?php echo $this->getContent(); ?>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
