<?php

class Title extends Element{

    static protected $elementType=Element::TYPE_TITLE;
    
    protected static $complementTableName='title';
    
    static protected function complementPropertyNameList (){
        return array(static::$level);
    }
    
    static protected $level='level';

	public function getLevel()
	{
	    return $this->get(static::$level);
	}
}