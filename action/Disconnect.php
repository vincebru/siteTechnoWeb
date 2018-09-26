<?php
class Disconnect extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="MainView";
    }
    
    public function execute() {
        UserModel::disconnect();
        return $this->getview();
    }

}

