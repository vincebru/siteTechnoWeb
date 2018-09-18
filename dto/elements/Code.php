<?php

class Code extends Element{
    
    static protected $elementType=Element::TYPE_CODE;
    
    public static $UPDATE_FIELD_VALUES="content = :content, language = :language";

    protected static $complementTableName='code';
    
    static protected function complementPropertyNameList (){
        return array(static::$language);
    }
    
    static protected $language='language';

    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,language) ".
            " values (:id,:language)"));
    }

    public static function getRemoveRequests(){
		return array_merge(
		    array("delete from ".strtolower(static::$complementTableName)." where element_id = :element_id"),
            parent::getRemovetRequests()
        );
	}

    public function getLanguage()
    {
        return $this->get(static::$language);
    }
}