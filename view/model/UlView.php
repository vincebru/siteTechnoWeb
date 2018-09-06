<?php
class UlView extends ElementView
{
    public function render()
    {
        ?>
        <ul>
        <?php echo $this->renderChildren(); ?>
        </ul>
        <?php
    }

    protected function buildModalHtmlContent($action)
    {
    }

    protected function renderOutline()
    {
        return '';
    }
}
