<?php

class Code extends Element{
    
    static protected $elementType=Element::TYPE_CODE;
    
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
    
    public function getLanguage()
    {
        return $this->get(static::$language);
    }
}