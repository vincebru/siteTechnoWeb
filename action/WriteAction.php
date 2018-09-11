<?php

class WriteAction extends Action
{
    
    public function execute() {
        
    }
    
    public static function checkAllowed($refArray){
        $object = static::getValue($refArray, 'object');
        if($object!='' && !GlobalModel::isUpdateAllowed($object)){
            throw new Exception('NotAllowed');
        }
    }
}

