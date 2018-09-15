<?php

class Menu extends Element{
    
    static protected $elementType=Element::TYPE_MENU;
    
    protected static $complementTableName='menu';
    
    static protected function complementPropertyNameList (){
        return array(static::$code);
    }
    
    static protected $code='code';
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,code) ".
            " values (:id,:code)"));
    }
    
    public static function getRemoveRequests(){
		return array_merge(
            array("delete from ".static::$complementTableName." where element_id = :element_id"),
            parent::getRemovetRequests()
        );
	}

    public function getCode()
    {
        return $this->get(static::$code);
    }
}