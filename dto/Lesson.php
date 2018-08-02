<?php

class Lesson extends Element{
	private $pageList;


	function __construct($data){
		self::constructFromValue($data['lesson_id'],$data['code'],$data['title']);
	}

	public function constructFromValue($id,$code, $title){
		parent::__construct($id,Element::TYPE_LESSON,$code, $title);
	}

	public function getPageList()
	{
	    return $this->pageList;
	}
	 
	public function setPageList($pageList)
	{
		$this->pageList = array();
		if (!is_null($pageList )){	
			$this->pageList = $pageList;
		}
	    
	    return $this;
	}
}