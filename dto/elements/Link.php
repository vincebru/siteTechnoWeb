<?php

class Link extends Element{
    
    static protected $elementType=Element::TYPE_LINK;
    
    protected static $complementTableName='link';
    
    static protected function complementPropertyNameList (){
        return array(static::$label);
    }
    
    static protected $label='label';
    
    public function getLabel()
    {
        return $this->get(static::$label);
    }
}