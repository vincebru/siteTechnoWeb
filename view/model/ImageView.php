<?php
class ImageView extends ElementView
{
    protected function render()
    {
        ?>
        <img src="image.php?id=<?php echo $this->element->getId(); ?>" width="<?php echo $this->element->getWidth(); ?>"
        height="<?php echo $this->element->getHeight(); ?>" alt="<?php echo $this->element->getContent(); ?>" />
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
