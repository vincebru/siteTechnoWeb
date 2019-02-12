<?php

class Menu extends Element{
    
    static protected $elementType=Element::TYPE_MENU;
    
    protected static $complementTableName='menu';
    public static $UPDATE_FIELD_VALUES="content = :content, code = :code";

    static protected function complementPropertyNameList (){
        return array(static::$code);
    }
    
    static protected $code='code';
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,code) ".
            " values (:id,:code)"));
    }
    
    public function getCode()
    {
        return $this->get(static::$code);
    }
}