<?php

abstract class DTO{

	protected static $isUptable=false;
	protected static $isAdminUptable=false;
	protected static $tableName;
	protected static $complementTableName;
	protected static $id;

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
	public static function hasComplementTableName()
	{
	    return isset(static::$complementTableName) && static::$complementTableName != '';
	}
	
	public static function getRequestById(){
		$complementJoin = '';
		$complementFields = '';
		if (static::hasComplementTableName()){
			foreach (static::complementPropertyNameList() as $propertyKey) {
				$complementFields .= ', comp.' . $propertyKey;
			}
			$complementJoin = ' JOIN ' . static::$complementTableName . ' comp ON comp.element_id = main.element_id ';
		}

		return 'SELECT main.* ' . $complementFields . ' FROM ' . static::$tableName . ' main ' . $complementJoin . ' WHERE main.'.static::$id . ' = :id ';
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
		if (!in_array($propertyName, static::propertyNameList())
		    && !in_array($propertyName, static::complementPropertyNameList())) {
			throw new Exception("Invalid property name ".$propertyName." for class ".get_class($this));
		}
	}

	public function patch($data){
	    if (isset($data['id']) && !isset($data[static::$id])) {
		    $data[static::$id]=$data['id'];
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
	
	public function getId(){
		return $this->get(static::$id);
	}
}