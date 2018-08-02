<?php

class Page extends Element{


	function __construct($data){
		self::constructFromValue($data['page_id'],$data['code'],$data['title']);
	}

	public function constructFromValue($id,$code, $title){
		parent::__construct($id,Element::TYPE_PAGE,$code, $title);
	}

	
}