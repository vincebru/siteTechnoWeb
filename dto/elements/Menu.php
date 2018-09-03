<?php

class Menu extends Element{
    
    static protected $elementType=Element::TYPE_MENU;
    
    protected static $complementTableName='menu';
    
    static protected function complementPropertyNameList (){
        return array(static::$code);
    }
    
    static protected $code='code';
    
    public function getCode()
    {
        return $this->get(static::$code);
    }
}