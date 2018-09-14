<?php
class CodeView extends ElementView
{
    public function __construct($args)
    {
        parent::__construct($args);
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

    public static function buildModelHtmlContent($action)
    {
    }
}
