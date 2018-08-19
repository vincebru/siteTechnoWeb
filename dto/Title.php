<?php

class Title extends Element{

	static protected $colType=Element::TYPE_TITLE;

	private $level;

	function __construct($data){
		self::constructFromValue($data['element_id'],$data['code'],$data['title'],$data['rank']);
	}

	public function constructFromValue($id,$code, $title, $position){
		parent::__construct($id,Element::TYPE_FORM,$code, $title, $position);
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