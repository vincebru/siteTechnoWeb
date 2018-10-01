<?php

class File extends Element{
    
    static protected $elementType=Element::TYPE_FILE;
    
    public static $UPDATE_FIELD_VALUES="content = :content";

    protected static $complementTableName='file';
    
    static protected function complementPropertyNameList (){
        return array(static::$name,static::$mime,static::$file);
    }
    
    static protected $mime='mime';
    static protected $name='name';
    static protected $file='file';
    
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id, mime,name,file) ".
            " values (:id, :mime,:name,:file)"));
    }

    public static function getRemoveRequests(){
		return array_merge(
		    array("delete from ".strtolower(static::$complementTableName)." where element_id = :element_id"),
            parent::getRemovetRequests()
        );
	}

    static public function getSpecificDatabaseType(){
        return array(static::$file=>PDO::PARAM_LOB);
    }
    
    public function getMime(){
        return $this->get(static::$mime);
    }
    public function getName(){
        return $this->get(static::$name);
    }
    public function getFile(){
        return $this->get(static::$file);
    }
    
    public function set($propertyName, $value){
        if ($propertyName==static::$file){
            
        }
    }
}