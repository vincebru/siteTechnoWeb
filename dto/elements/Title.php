<?php

class Title extends Element{

	static protected $colType=Element::TYPE_TITLE;

	private $level;

	function __construct($data){
		self::constructFromValue($data['element_id'],$data['content'],$data['position']);
		$this->level = $data['level'];
	}

	public function getLevel()
	{
	    return $this->level;
	}
	 
	public function setLevel($level)
	{
	    $this->level = $level;
	    return $this;
	}
}