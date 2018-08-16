<?php

class Element{


	const TYPE_MENU='MENU';
	const TYPE_LESSON='LESSON';
	const TYPE_PAGE='PAGE';

	private $id;
	private $type;
	private $code;
	private $title;

	function __construct($id, $type, $code, $title){
		$this->id=$id;
		$this->type=$type;
		$this->code=$code;
		$this->title=$title;
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

	public function getType()
	{
		return $this->type;
	}
	public function setType($type)
	{
		$this->type = $type;
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

	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}
}