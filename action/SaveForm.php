<?php

class SaveForm extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="MainView";
    }
    
    
    public function execute() {
        InputModel::addOrUpdateValue($this->data);
        
        return $this->getview();
        
    }
}