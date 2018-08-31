<?php
class InputView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="input-<?php echo $this->element->getId(); ?>"><?php echo $this->element->getLabel(); ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-<?php echo $this->element->getId(); ?>" placeholder="<?php echo $this->element->getLabel(); ?>" value="input-<?php echo $this->element->getContent(); ?>"/>
            </div>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
