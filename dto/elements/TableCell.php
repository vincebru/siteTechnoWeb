<?php

class TableCell extends Element{

	static protected $colType=Element::TYPE_TABLE_CELL;

	private $span;

	function __construct($data){
		self::constructFromValue($data['element_id'],$data['content'],$data['position']);
		$this->span = $data['span'];
	}

	public function getSpan()
	{
	    return $this->span;
	}
	 
	public function setSpan($span)
	{
	    $this->span = $span;
	    return $this;
	}
}