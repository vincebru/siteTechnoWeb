<?php

abstract class  Action
{
    protected $data;
    
    function __construct($data){
        $this->data=$data;
    }
    
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

