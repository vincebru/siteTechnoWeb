<?php
class ResultView extends AbstractView
{
    
    public function __construct($args){
        parent::__construct(array_merge($args,array(AbstractLinkView::PROPERTY_MENU=>'Result')));
    }
    
    public function getHtml()
    {
        ?> 
        <div class="container mt-3">
            <p>You'll find your results here.</p>
        </div>
        <?php
    }
}
