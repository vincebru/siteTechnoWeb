<?php

class TableCell extends Element{
    
    static protected $elementType=Element::TYPE_TABLE_CELL;
    
    protected static $complementTableName='table_cell';
    
    static protected function complementPropertyNameList (){
        return array(static::$span);
    }
    
    static protected $span='span';
    
    public function getSpan()
    {
        return $this->get(static::$span);
    }
}