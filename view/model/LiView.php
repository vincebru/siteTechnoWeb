<?php
class LiView extends ElementView
{
    public function render()
    {
        ?>
        <li>
        <?php echo htmlspecialchars($this->getElement()->getContent()); ?>
        </li>
        <?php
    }

    protected function buildModalHtmlContent($action)
    {
        $content = '';
        $readonly = '';
        if ($action != ElementView::ACTION_ADD){
            $content = ' value="' . $this->getElement()->getContent() . '"';
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
        </form>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }
}
