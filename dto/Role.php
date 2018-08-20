<?php

class Role extends DTO{

	static protected $tableName="role";
	static protected $colId="role_id";
	static protected $isAdminRequestable=true;

	private $id;
	private $code;
	private $name;


	function __construct($data){
		self::constructFromValue($data['role_id'],$data['code'],$data['name']);
	}

	public function constructFromValue($id,$code, $name){
		$this->id=$id;
		$this->code=$code;
		$this->name=$name;
		$this->tableName="role";
		$this->colId="role_id";
	}

	public function getId()
	{
	    return $this->id;
	}
	 
	public function setId($id)
	{
	    $this->id = $id;

	    return $this;
	}

	public function getCode()
	{
	    return $this->code;
	}
	 
	public function setCode($code)
	{
	    $this->code = $code;
	    return $this;
	}

	public function getName()
	{
	    return $this->name;
	}
	 
	public function setName($name)
	{
	    $this->name = $name;
	    return $this;
	}
}