<?php

class InputTextValue extends InputValue{
    
    protected static $complementTableName='input_text_value';
    
    static protected $inputType=InputValue::TYPE_TEXT;

	static public $inputValue='input_value';
	
	public static $UPDATE_FIELD_VALUES= "input_value = :input_value";
	
	
	static protected function complementPropertyNameList (){
	    return array(
		    static::$inputValue
		);
	}
	
	public static function getInsertRequests(){
	    return array_merge(parent::getInsertRequests(),array("insert into ".static::$complementTableName.
	        " (input_value_id, ".static::$inputValue.") ".
	        " values (:id, :".static::$inputValue.")"));
	}
	
	public function getInputValue()
	{
	    return $this->get(static::$inputValue);
	}
	 
	public function setInputValue($inputValue)
	{
	    $this->set(static::$inputValue, $inputValue);
	    return $this;
	}
	
}