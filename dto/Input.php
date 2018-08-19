<?php

class Input extends Element{

	static protected $colType=Element::TYPE_INPUT;

	private $label;

	function __construct($data){
		self::constructFromValue($data['element_id'],$data['code'],$data['title'],$data['rank']);
	}

	public function constructFromValue($id,$code, $title, $position){
		parent::__construct($id,Element::TYPE_FORM,$code, $title, $position);
	}

	public function getLabel()
	{
	    return $this->label;
	}
	 
	public function setLabel($label)
	{
	    $this->label = $label;
	    return $this;
	}
}