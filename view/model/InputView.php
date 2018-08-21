<?php
class InputView extends Element {

    protected function render(){
        ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="input-<? echo $this->element.getId(); ?>"><? echo $this->element.getLabel(); ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-<? echo $this->element.getId(); ?>" placeholder="<? echo $this->element.getLabel(); ?>" value="input-<? echo $this->element.getContent(); ?>"/>
            </div>
        </div>
        <?php
    }

    protected function renderOutline(){
        return "";
    }
}
