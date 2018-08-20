<?php

class Lesson extends Element{

	static protected $colType=Element::TYPE_LESSON;

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