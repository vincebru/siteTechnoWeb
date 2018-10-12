<?php
class ImageView extends ElementView
{
    protected function render()
    {
        ?>
        <br>
        <img class="rounded mx-auto d-block img-fluid" src="file.php?id=<?php echo $this->getElement()->getId(); ?>" width="<?php echo $this->getElement()->getWidth(); ?>"
        height="<?php echo $this->getElement()->getHeight(); ?>" alt="<?php echo $this->getElement()->getContent(); ?>" />
        <br>
        <?php
    }

    protected function renderOutline()
    {
        return '';
    }

    protected function buildModalHtmlContent($action)
    {
        $content = '';
        $with = '';
        $height = '';
        $readonly = '';
        if ($action != ElementView::ACTION_ADD){
            $content = ' value="' . $this->getElement()->getContent() . '"';
            $width = ' value="' . $this->getElement()->get("width") . '"';
            $height = ' value="' . $this->getElement()->get("height") . '"';
        }
        if ($action == ElementView::ACTION_REMOVE){
            $readonly = 'readonly';
        }
        ?>
        <form>
            <div class="form-group row">
                <label for="Content" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
            <div class="form-group row">
                <label for="Width" class="col-sm-2 col-form-label">Width</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="width" <?php echo $readonly; echo $width; ?>/>
                </div>
            </div>
            <div class="form-group row">
                <label for="Height" class="col-sm-2 col-form-label">Height</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="height" <?php echo $readonly; echo $height; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
