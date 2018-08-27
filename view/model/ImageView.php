<?php
class ImageView extends ElementView {

    protected function render(){
        ?>
        <img src="<?php echo $this->element->getContent(); ?>" width="<?php echo $this->element->getWidth(); ?>" height="<?php echo $this->element->getHeight(); ?>" alt="<?php echo $this->element->getTitle(); ?>" />
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
