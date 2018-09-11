<?php

abstract class  Action
{
    
    public static function getValue($array, $key) {
        if (isset($array[$key])) {
            return $array[$key];
        }
        
        return '';
    }
    
    public static function checkAllowed($refArray){
        
    }
    
    public abstract function execute();
}

