<?php

class TableCell extends Element{

	static protected $colType=Element::TYPE_TABLE_CELL;

	private $span;

	function __construct($data){
		self::constructFromValue($data['element_id'],$data['code'],$data['title'],$data['rank']);
	}

	public function constructFromValue($id,$code, $title, $position){
		parent::__construct($id,Element::TYPE_FORM,$code, $title, $position);
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