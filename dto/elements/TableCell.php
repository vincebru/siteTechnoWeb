<?php

class TableCell extends Element{
    
    static protected $elementType=Element::TYPE_TABLE_CELL;
    public static $UPDATE_FIELD_VALUES="content = :content, span = :span";

    protected static $complementTableName='table_cell';
    
    static protected function complementPropertyNameList (){
        return array(static::$span);
    }
    
    static protected $span='span';
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,span) ".
            " values (:id,:span)"));
    }
    
    public function getSpan()
    {
        return $this->get(static::$span);
    }
}