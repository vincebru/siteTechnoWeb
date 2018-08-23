<?php

class Input extends Element{

	static protected $colType=Element::TYPE_INPUT;

	private $label;

	function __construct($data){
		self::constructFromValue($data['element_id'],$data['content'],$data['position']);
		$this->label = $data['label'];
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