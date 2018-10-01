<?php

class AdminLinkView extends AbstractLinkView
{
    public function __construct($args)
    {
        parent::__construct($args);
        $this->cssFiles['admin'] = 'admin';
        $this->jsFiles['admin'] = 'admin';
    }


    
}
