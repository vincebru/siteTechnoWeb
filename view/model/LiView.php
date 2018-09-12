<?php
class LiView extends ElementView
{
    public function render()
    {
        ?>
        <li>
        <?php echo htmlspecialchars($this->element->getContent()); ?>
        </li>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
