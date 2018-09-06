<?php

class ManageAction{
    
    private $context;
    private $action;
    private $refArray;
    
    function __construct($context, $action, $refArray){
        $this->context=$context;
        $this->action=$action;
        $this->refArray=$refArray;
    }
    
    public function execute(){
        if (class_exists($this->action)) {
            $action = new $this->action($this->refArray);
            $action->execute();
        }
    }
    
}

if (isset($context)){
    $manageAction = new ManageAction($context, $action, $refArray);
    $manageAction->execute();
} // load action file
else if (file_exists($actionFile)) {
    logDebug('load '.$page.' action page.');
    include $actionFile;
} else {
    logDebug('no action for '.$page);
}
