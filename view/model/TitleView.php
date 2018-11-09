<?php
class TitleView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="ul-container">
            <h<?php echo $this->element->getLevel(); ?> id="title-<?php echo $this->getElement()->getId(); ?>"><?php echo str_replace("\n", '<br />',htmlspecialchars($this->getElement()->getContent())); ?></h<?php echo $this->getElement()->getLevel(); ?>>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        if($this->element->getLevel()==1){
            ?>
            <a class="nav-link ml-4" href="#title-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
            <?php
        }
    }

    protected function buildModalHtmlContent($action)
    {
        $content = '';
        $level = '';
        $readonly = '';
        if ($action != ElementView::ACTION_ADD){
            $content = ' value="' . $this->getElement()->getContent() . '"';
            $level = ' value="' . $this->getElement()->get("level") . '"';
        }
        if ($action == ElementView::ACTION_REMOVE){
            $readonly = 'readonly';
        }
        ?>
        <form>
            <div class="form-group row">
                <label for="Content" class="col-sm-2 col-form-label">Text</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
            <div class="form-group row">
                <label for="Level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="level" <?php echo $readonly; echo $level; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
