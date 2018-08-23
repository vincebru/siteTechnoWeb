<?php

class Link extends Element{

	static protected $colType=Element::TYPE_LINK;

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