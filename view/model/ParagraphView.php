<?php
class ParagraphView extends ElementView
{
    protected function render()
    {
        ?>
        <p>
        <?php echo htmlspecialchars($this->element->getContent()); ?>
        <?php echo $this->renderChildren(); ?>
        </p>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
