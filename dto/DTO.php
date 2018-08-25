<?php

abstract class DTO{

	protected static $isUptable=false;
	protected static $isAdminUptable=false;
	protected static $tableName;
	protected static $complementTableName;
	protected static $colId;

	public static $UPDATE_FIELD_KEY="#UPDATE_FIELD_KEY#";

	function __construct($data){
		$this->values=array();
		foreach (static::propertyNameList() as $propertyKey) {
			if (isset($data[$propertyKey])) {
				$this->values[$propertyKey]=$data[$propertyKey];
			}
		}
		foreach (static::complementPropertyNameList() as $propertyKey) {
			if (isset($data[$propertyKey])) {
				$this->values[$propertyKey]=$data[$propertyKey];
			}
		}
	}

	static protected function propertyNameList (){
		return array();
	}
	static protected function complementPropertyNameList (){
		return array();
	}

	private $updatedProperties;
	protected $values;

	public static function isUptable()
	{
	    return static::$isUptable;
	}
	public static function isAdminUptable()
	{
	    return static::$isAdminUptable;
	}
	
	public static function getRequestById(){
		return "select * from ".static::$tableName." where ".static::$colId."=:id";
	}
	
	public static function getInsertRequest(){
		return array();
	}

	protected function addUpdatedProperty($propertyName){
		if (!isset($this->updatedProperties)){
			$this->updatedProperties=array();
		}
		if(!in_array($propertyName,$this->updatedProperties)){
			$this->updatedProperties[]=$propertyName;
		}
	}

	private function verifyPropertyName($propertyName){
		if (!in_array($propertyName, static::propertyNameList())) {
			throw new Exception("Invalid property name ".$propertyName." for class ".get_class($this));
		}
	}

	public function patch($data){
		if (isset($data['id']) && !isset($data[$id])) {
			$data[$id]=$data['id'];
		}
		foreach (static::propertyNameList() as $propertyName) {
			if(isset($data[$propertyName])){
				$this->set($propertyName,$data[$propertyName]);
			}
		}
	}

	public function set($propertyName, $value){
		$this->verifyPropertyName($propertyName);
		$this->values[$propertyName]=$value;
		$this->addUpdatedProperty($propertyName);
		return $this;
	}

	public function get($propertyName){
		$this->verifyPropertyName($propertyName);
		if (isset($this->values[$propertyName])){
			return $this->values[$propertyName];
		}
		return null;
	}
}