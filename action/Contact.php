<?php

class Contact extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="ContactView";
    }
    
    public function execute() {
        $class = new ContactView($this->data);
        $class->setMsg("test");
        $this->currentView = $class;
        return $this->getview();
    }
}

