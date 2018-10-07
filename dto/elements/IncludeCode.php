<?php

class IncludeCode extends Element{
  
    static protected $elementType=Element::TYPE_INCLUDE_CODE;
    
  /*  public static $UPDATE_FIELD_VALUES="content = :content, precode = :precode";
    
    protected static $complementTableName='include_code';
    
    static protected function complementPropertyNameList (){
        return array(static::$precode);
    }
    
    static protected $precode='precode';
    
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,precode) ".
            " values (:id,:precode)"));
    }
    
    public static function getRemoveRequests(){
        return array_merge(
            array("delete from ".strtolower(static::$complementTableName)." where element_id = :element_id"),
            parent::getRemovetRequests()
            );
    }
    
    public function getPrecode()
    {
        return $this->get(static::$precode);
    }
	*/
}