<?php

class Input extends Element{
    
    static protected $elementType=Element::TYPE_INPUT;
    public static $UPDATE_FIELD_VALUES="content = :content, label = :label";

    protected static $complementTableName='input';
    
    static protected function complementPropertyNameList (){
        return array(static::$label);
    }
    
    static protected $label='label';

    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,label) ".
            " values (:id,:label)"));
    }
    
    public function getLabel()
    {
        return $this->get(static::$label);
    }
}