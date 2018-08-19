<?php

class Lesson extends Element{

	static protected $colType=Element::TYPE_LESSON;


	function __construct($data){
		self::constructFromValue($data['element_id'],$data['code'],$data['title'],$data['rank']);
	}

	public function constructFromValue($id,$code, $title, $position){
		parent::__construct($id,Element::TYPE_LESSON,$code, $title, $position);
	}

	public function getPageList()
	{
	    return $this->subElements;
	}
	 
	public function setPageList($pageList)
	{
		$this->subElements = array();
		if (!is_null($pageList )){	
			$this->subElements = $pageList;
		}
	    
	    return $this;
	}
}