<?php
class LinkView extends ElementView {

    protected function render(){
        ?>
        <a href="<?php echo $this->element.getContent(); ?>"><?php echo $this->element.getLabel(); ?></a>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
