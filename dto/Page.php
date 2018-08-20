<?php

class Page extends Element{
  
	function __construct($data){
		self::constructFromValue($data['element_id'],$data['code'],$data['title'],$data['rank']);
	}

	public function constructFromValue($id,$code, $title, $position){
		parent::__construct($id,Element::TYPE_PAGE,$code, $title, $position);
	}

	public function getContent()
	{
		return "";
	}
	public function setContent($content)
	{
		return $this;
	}
}