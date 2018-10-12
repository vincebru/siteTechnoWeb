<?php
class FileView extends ElementView
{
    protected function render()
    {
        ?>
        <a href="file.php?id=<?php echo $this->getElement()->getId(); ?>" download="<?php echo $this->getElement()->getName(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
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
                <label for="Content" class="col-sm-2 col-form-label">HRef</label>
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
