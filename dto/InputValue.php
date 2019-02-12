<?php

class InputValue extends DTO{

    static protected $isAdminUptable = true;
    static protected $id = 'input_value_id';
    
    
    const TYPE_TEXT='InputTextValue';
    const TYPE_FILE='InputFileValue';
    
    static public $type='type';
    static protected $inputType;
    
    static protected $tableName = 'input_value';

	static public $elementId='element_id';
	static public $userId='user_id';

	static protected function propertyNameList (){
	    return array(static::$id,
	        static::$type, 
		    static::$elementId,
		    static::$userId
		);
	}
	
	function __construct($data){
	    $data[static::$type]=static::$inputType;
	    parent::__construct($data);
	}
	
	
	static public function uniqueConstraintKeyList (){
	    return array(static::$elementId, static::$userId);
	}

	public function setId($id)
	{
	    $this->set(static::$id, $id);

	    return $this;
	}

	public function getElementId()
	{
	    return $this->get(static::$elementId);
	}
	 
	public function setElementId($elementId)
	{
	    $this->set(static::$elementId, $elementId);
	    return $this;
	}
	
	public function getUserId()
	{
	    return $this->get(static::$userId);
	}
	
	public function setUserId($userId)
	{
	    $this->set(static::$userId, $userId);
	    return $this;
	}
	
	public function getType(){
	    return $this->get(static::$type);
	}
	
	public function getElementType()
	{
	    return static::$inputType;
	}
	
	public static function getSelectRequest(){
	    return parent::getSelectRequest() . " and main.type='" . static::$inputType . "'";
	}
	
	public static function getRequestById(){
	    return parent::getRequestById() . " and main.type='" . static::$inputType . "'";
	}
	
	public static function getInsertRequests(){
	    return array("insert into ".static::$tableName." (type, element_id, user_id) ".
	        "values (:object,:element_id, :user_id)");
	}
	
	public static function getPatchRequest(){
	    if (static::$complementTableName == null){
	        return "";
	    } else {
	        return "update ".static::$complementTableName." set ".static::$UPDATE_FIELD_KEY.
	        " where ".static::$id." = :id ";
	    }
	}
	public static function getRemoveRequests(){
	    
	    $result= array("delete from ".strtolower(static::$tableName)." where ".static::$id." = :id");
	    if (static::$complementTableName != null){
	        return array_merge($result, 
	            array("delete from ".strtolower(static::$complementTableName)." where ".static::$id." = :id"));
	    }
	    return $result;
	}
	
	
}