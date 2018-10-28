<?php

abstract class AbstractView
{
    protected $args;
    protected $jsFiles;
    protected $cssFiles;
    private $edit;

    public function __construct($args)
    {
        $this->args = $args;
        $this->jsFiles = array();
        $this->cssFiles = array();

        $this->edit=false;
        if (isset($args['edit']) && $args['edit']=true){
            $this->edit=true;
        }

        $this->cssFiles['common'] = 'common';
        $this->jsFiles['common'] = 'script';
    }

    public function getCssFiles()
    {
        return $this->cssFiles;
    }

    public function getJsFiles()
    {
        return $this->jsFiles;
    }

    public function getViewHtml()
    {
        ob_start();
        
        $this->checkAllowed();
        
        $this->getHtml();
        $viewHtml = ob_get_contents();
        ob_end_clean();

        return $viewHtml;
    }
    
    public function checkAllowed() {
        return true;
    }

    abstract public function getHtml();

    public function getStatus()
    {
        return ' tout va bien !';
    }


    protected function isEdit(){
        return $this->edit;
    }
}
