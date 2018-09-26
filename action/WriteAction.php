<?php

class WriteAction extends Action
{
    
    public static function checkAllowed($refArray){
        $object = static::getValue($refArray, 'object');
        if($object!='' && !GlobalModel::isUpdateAllowed($object)){
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }
}

