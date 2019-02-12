<?php
class InputFileView extends ElementView
{
    protected function render()
    {
        InputModel::populateInput($this->getElement());
        
        $inputValue = $this->getElement()->getInputValue(UserModel::getConnectedUser()->getId());
        
        $value="";
        if ($inputValue!=null){
            $value=$inputValue->getName();
        }
        ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="input-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getLabel(); ?></label>
        	<div class="col-sm-9">
                <input type="file" class="form-control" id="input-<?php echo $this->getElement()->getId(); ?>" name="<?php echo $this->getElement()->getContent(); ?>"/>
            </div>
            <div class="col-sm-1">
            <?php if($value!=""){?>
                <i class="fa fa-check-circle-o" id='container'></i>
            <?php } else {?>
                <i class="fa fa-circle-o" id='container'></i>
            <?php }?>
            </div>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }

    protected function buildModalHtmlContent($action)
    {
        $content = '';
        $label = '';
        $readonly = '';
        if ($action != ElementView::ACTION_ADD){
            $content = ' value="' . $this->getElement()->getContent() . '"';
            $label = ' value="' . $this->getElement()->get("label") . '"';
        }
        if ($action == ElementView::ACTION_REMOVE){
            $readonly = 'readonly';
        }
        ?>
        <form>
            <div class="form-group row">
                <label for="Content" class="col-sm-2 col-form-label">Value</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
            <div class="form-group row">
                <label for="Label" class="col-sm-2 col-form-label">Label</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="label" <?php echo $readonly; echo $label; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
