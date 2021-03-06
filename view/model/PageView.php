<?php
class PageView extends ElementView
{
    protected function render()
    {
        ?>
        <h2 id="page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></h2>
        <?php echo $this->renderChildren(); ?>
        <?php
    }

    protected function renderOutline()
    {
        ?>
        <a class="nav-link ml-2" href="#page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <nav class="nav nav-pills flex-column">
        <?php echo $this->renderChildrenOutline(); ?>
        </nav>
        <?php
    }

    public function buildModalHtmlContent($action)
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
                <label for="Content" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
