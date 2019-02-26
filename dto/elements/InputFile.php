<?php

class InputFile extends Input{
    
    static protected $elementType=Element::TYPE_INPUT_FILE;
    
    protected static $complementTableName='input_file';
    public static $UPDATE_FIELD_VALUES="content = :content, label = :label, mime_allowed = :mime_allowed";
    
    static protected function complementPropertyNameList (){
        return array_merge(Input::complementPropertyNameList(),array(static::$mimeAllowed));
    }
    
    static protected $mimeAllowed='mime_allowed';
    
    public static function getInsertRequests(){
        return array_merge(Element::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,label,mime_allowed) ".
            " values (:id,:label,:mime_allowed)"));
    }
    
    public function getMimeAllowed()
    {
        return $this->get(static::$mimeAllowed);
    }
}