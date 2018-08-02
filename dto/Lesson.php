<?php

class Lesson{
	private $id;
	private $code;
	private $title;
	private $pageList;


	function __construct($data){
		self::constructFromValue($data['lesson_id'],$data['code'],$data['title']);
	}

	public function constructFromValue($id,$code, $title){
		$this->id=$id;
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
	public function getPageList()
	{
	    return $this->pageList;
	}
	 
	public function setPageList($pageList)
	{
		$this->pageList = array();
		if (!is_null($pageList )){	
			$this->pageList = $pageList;
		}
	    
	    return $this;
	}
}