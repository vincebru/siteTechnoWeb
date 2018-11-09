<?php
class TableCellView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="col-<?php echo $this->getElement()->getSpan(); ?>">
        <?php echo str_replace("\n", '<br />',htmlspecialchars($this->getElement()->getContent())); ?>
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
        $span = '';
        $readonly = '';
        if ($action != ElementView::ACTION_ADD){
            $content = ' value="' . $this->getElement()->getContent() . '"';
            $span = ' value="' . $this->getElement()->get("span") . '"';
        }
        if ($action == ElementView::ACTION_REMOVE){
            $readonly = 'readonly';
        }
        ?>
        <form>
            <div class="form-group row">
                <label for="Content" class="col-sm-2 col-form-label">Contant</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
            <div class="form-group row">
                <label for="Span" class="col-sm-2 col-form-label">Span</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="span" <?php echo $readonly; echo $span; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
