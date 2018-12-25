<?php
class ChangeSessionGroup extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="MainView";
    }
    
    public function execute() {
        if(isset($this->data["sessionGroupId"])){
            $_SESSION["currentSessionGroupId"]=$this->data["sessionGroupId"];
            if ($_SESSION["currentSessionGroupId"]=="null"){
                unset($_SESSION["currentSessionGroupId"]);
            }
        }
        
        return $this->getview();
    }

}

