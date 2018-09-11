<?php

class AjaxAction extends Action
{
    protected $data;
    
    function __construct($data){
        $this->data=$data;
    }
    
    public function execute() {
        
    }
    
    public static function checkAllowed($refArray){
        $object = static::getValue($refArray, 'object');
        if(!GlobalModel::isUpdateAllowed($object)){
            throw new Exception('NotAllowed');
        }
    }
}

