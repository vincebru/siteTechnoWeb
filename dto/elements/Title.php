<?php

class Title extends Element{

    static protected $elementType=Element::TYPE_TITLE;
    public static $UPDATE_FIELD_VALUES="content = :content, level = :level";

    protected static $complementTableName='title';
    
    static protected function complementPropertyNameList (){
        return array(static::$level);
    }
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,level) ".
            " values (:id,:level)"));
    }
    
    static protected $level='level';

	public function getLevel()
	{
	    return $this->get(static::$level);
	}
}