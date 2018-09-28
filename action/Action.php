<?php

class Action
{
    protected $data;
    private $viewClass;
    private $curentView;
    
    function __construct($data){
        $this->data=$data;
        $page = 'Main';
        if (isset($data['page'])) {
            $page = $data['page'];
        }
        $this->viewClass = $page.'View';
    }
    
    public static function getValue($array, $key) {
        if (isset($array[$key])) {
            return $array[$key];
        }
        
        return '';
    }
    
    public static function checkAllowed($refArray){
        
    }
    
    protected function setViewClass($viewClass) {
        $this->viewClass = $viewClass;
    }

    protected function getViewClass() {
        return $this->viewClass;
    }

    protected function getview(){
        if(isset($this->currentView)) {
            return $this->currentView;
        } else {
            if (!class_exists($this->viewClass)){
                $this->viewClass = 'MainView';
                logDebug('The main view will be loaded. Class '.$this->viewClass.' does not exist :/ ');
            }
        
            $class=$this->viewClass;
            return new $class($this->data);
        }
    }
    
    public function execute(){
        return $this->getview();
    }
}

