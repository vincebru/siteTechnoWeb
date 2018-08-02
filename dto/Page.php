<?php

class Page{
	private $id;
	private $code;
	private $title;
	private $rank;


	function __construct($data){
		self::constructFromValue($data['page_id'],$data['code'],$data['title'],
			$data['rank']);
	}

	public function constructFromValue($id,$code, $title, $rank){
		$this->id=$id;
		$this->code=$code;
		$this->title=$title;
		$this->rank=$rank;
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
	public function getRank()
	{
	    return $this->rank;
	}
	 
	public function setRank($rank)
	{
	    $this->rank = $rank;
	    return $this;
	}
}