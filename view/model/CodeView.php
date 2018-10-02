<?php
class CodeView extends ElementView
{
    public function __construct($args, $parent)
    {
        parent::__construct($args, $parent);
        $this->elements = LessonModel::getAllElementsForAdmin('Lesson');
        $this->cssFiles['code'] = 'styles/default';
        $this->jsFiles['highlight'] = 'highlight.pack';
        $this->jsFiles['code'] = 'code';
        $this->modals = array();
    }

    public function render()
    {
        ?>
        <pre><code class="<?php echo $this->getElement()->getLanguage(); ?>"><?php echo htmlspecialchars($this->getElement()->getContent()); ?></code></pre>
    <?php
    }

    protected function renderOutline()
    {
        return '';
    }

    protected function buildModalHtmlContent($action)
    {
        $content = '';
        $language = '';
        $readonly = '';
        if ($action != ElementView::ACTION_ADD){
            $content = ' value="' . $this->getElement()->getContent() . '"';
            $language = ' value="' . $this->getElement()->get("language") . '"';
        }
        if ($action == ElementView::ACTION_REMOVE){
            $readonly = 'readonly';
        }
        ?>
        <form>
            <div class="form-group row">
                <label for="Content" class="col-sm-2 col-form-label">Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
            <div class="form-group row">
                <label for="Language" class="col-sm-2 col-form-label">Language</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="language" <?php echo $readonly; echo $language; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
