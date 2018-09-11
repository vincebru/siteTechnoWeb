<?php
class CodeView extends ElementView
{
    public function __construct($args)
    {
        parent::__construct($args);
        $this->elements = LessonModel::getAllElementsForAdmin('Lesson');
        $this->cssFiles['code'] = 'styles/default.css';
        $this->jsFiles['highlight'] = 'highlight.pack.js';
        $this->jsFiles['code'] = 'code.js';
        $this->modals = array();
    }

    public function render()
    {
        ?>
        <pre><code class="<?php echo $this->getElement()->getLanguage(); ?>"><?php echo $this->getElement()->getContent(); ?></code></pre>
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
