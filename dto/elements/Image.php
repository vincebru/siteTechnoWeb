<?php

class Image extends Element{
    
    static protected $elementType=Element::TYPE_IMAGE;
    
    public static $UPDATE_FIELD_VALUES="content = :content, width = :width, height = :height";

    protected static $complementTableName='image';
    
    static protected function complementPropertyNameList (){
        return array(static::$width,static::$height,static::$mime,static::$file);
    }
    
    static protected $width='width';
    static protected $height='height';
    static protected $mime='mime';
    static protected $file='file';
    
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (element_id,width, height, mime,file) ".
            " values (:id,:width, :height, :mime,:file)"));
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
    
    public function getWidth()
    {
        return $this->get(static::$width);
    }
    
    public function getHeight()
    {
        return $this->get(static::$height);
    }
    public function getMime(){
        return $this->get(static::$mime);
    }
    public function getFile(){
        return $this->get(static::$file);
    }
    
    public function set($propertyName, $value){
        if ($propertyName==static::$file){
            
        }
    }
    /*
     autre methode pour specifier que le champ est un blob
     $data = $req->fetch(PDO::FETCH_ASSOC);
    
    $req->bindColumn(1, $mime);
    $req->bindColumn(2, $data, PDO::PARAM_LOB);
    
     $req->fetch(PDO::FETCH_BOUND);
     */
}