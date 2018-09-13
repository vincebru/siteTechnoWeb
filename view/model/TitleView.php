<?php
class TitleView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="ul-container">
            <h<?php echo $this->element->getLevel(); ?> id="title-<?php echo $this->element->getId(); ?>"><?php echo htmlspecialchars($this->element->getContent()); ?></h<?php echo $this->element->getLevel(); ?>>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        if($this->element->getLevel()==1){
            ?>
            <a class="nav-link ml-4" href="#title-<?php echo $this->element->getId(); ?>"><?php echo $this->element->getContent(); ?></a>
            <?php
        }
    }
}
