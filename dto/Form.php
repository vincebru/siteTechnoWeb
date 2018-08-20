<?php

class Form extends Element{

	static protected $colType=Element::TYPE_FORM;


	function __construct($data){
		self::constructFromValue($data['element_id'],$data['code'],$data['title'],$data['rank']);
	}

	public function constructFromValue($id,$code, $title, $position){
		parent::__construct($id,static::$colType,$code, $title, $position);
	}
}