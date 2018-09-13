<?php
class TableCellView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="col-<?php echo $this->element->getSpan(); ?>">
        <?php echo htmlspecialchars($this->element->getContent()); ?>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
