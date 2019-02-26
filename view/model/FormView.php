<?php
class FormView extends ElementView
{
    public function render()
    {
        ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
        	<input type='hidden' name='form_id' value='<?php echo $this->getElement()->getId()?>' />
        	<input type='hidden' name='page' value='SaveForm' />
        	<input type='hidden' name='sourceLessonId' value='<?php echo $this->lessonId?>' />
        <?php echo $this->renderChildren(); ?>
        	<input type='reset' />
        	<input type='submit' />
        </form>
        <?php
    }

    protected function renderOutline()
    {
        return '';
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
        <form >
            <div class="form-group row">
                <label for="Content" class="col-sm-2 col-form-label">Action</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
