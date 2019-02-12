<?php

class InputFileValue extends InputValue{
        
    protected static $complementTableName='input_file_value';
    
    static protected $inputType=InputValue::TYPE_FILE;
    
    
    static public $mime='mime';
    static public $name='name';
    static public $file='file';
    
    public static $UPDATE_FIELD_VALUES= "mime = :mime, name= :name,file = :file";
    
    static protected function complementPropertyNameList (){
        return array(
            static::$mime,
            static::$name,
            static::$file
        );
    }
    
    public static function getInsertRequests(){
        return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
            " (input_value_id, ".static::$mime.", ".static::$name.", ".static::$file.") ".
            " values (:id, :".static::$mime.", :".static::$name.", :".static::$file.")"));
    }
    /**
     * @return string
     */
    public function getMime()
    {
        return $this->get(static::$mime);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->get(static::$name);
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->get(static::$file);
    }

    /**
     * @param string $mime
     */
    public function setMime($mime)
    {
        $this->set(static::$mime, $mime);
        return $this;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->set(static::$name, $name);
        return $this;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->set(static::$file, $file);
        return $this;
    }

    
    
}