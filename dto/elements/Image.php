<?php

class Image extends Element{
    
    static protected $elementType=Element::TYPE_IMAGE;
    
    protected static $complementTableName='image';
    
    static protected function complementPropertyNameList (){
        return array(static::$width,static::$width);
    }
    
    static protected $width='width';
    static protected $height='height';
    
    public function getWidth()
    {
        return $this->get(static::$width);
    }
    
    public function getHeight()
    {
        return $this->get(static::$height);
    }
}