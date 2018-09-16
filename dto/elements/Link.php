<?php

class Link extends Element{
    
    static protected $elementType=Element::TYPE_LINK;
    public static $UPDATE_FIELD_VALUES="content = :content, label = :label";

    protected static $complementTableName='link';
    
    static protected function complementPropertyNameList (){
        return array(static::$label);
    }
    
    static protected $label='label';

    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,label) ".
            " values (:id,:label)"));
    }

    public static function getRemoveRequests(){
		return array_merge(
            array("delete from ".static::$complementTableName." where element_id = :element_id"),
            parent::getRemovetRequests()
        );
	}

    public function getLabel()
    {
        return $this->get(static::$label);
    }
}