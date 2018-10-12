<?php

class WorkGroup{
	private $id;
	private $code;
	private $name;

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