<?php

abstract class Element extends DTO{


	const TYPE_MENU='Menu';
	const TYPE_LESSON='Lesson';
	const TYPE_PAGE='Page';
	const TYPE_FORM='Form';
	const TYPE_PARAGRAPH='Paragraph';
	const TYPE_LINK='Link';
	const TYPE_IMAGE='Image';
	const TYPE_TITLE='Title';
	const TYPE_INPUT='Input';
	const TYPE_TABLE='Table';
	const TYPE_TABLE_ROW='TableRow';
	const TYPE_TABLE_CELL='TableCell';

	static protected $tableName="element";
	static protected $colId="element_id";
	static protected $colType;
	static protected $isAdminRequestable=true;

	private $id;
	private $type;
	private $content;
	private $subElements;
	private $position;
	

	function __construct($data){
		self::constructFromValue($data['element_id'], $data['content'], $data['rank']);
	}

	public function constructFromValue($id, $content, $position){
		$this->id=$id;
		$this->type=static::$colType;
		$this->content=$content;
		$this->position=$position;
	}
	public static function getRequestById(){
		return "select * from ".static::$tableName." where ".
			static::$colId."=:id and type='".static::$colType."'";
	}

	public static function getRequestSubElementById(){
		return "select * from ".static::$tableName." e join element_element on e.".static::$colId.
			"=element_element.child_id where parent_id=:id";
	}
	
	public function getHtml(){
		include "view/model/".$this->type."View.php";
	}

	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getType()
	{
		return $this->type;
	}
	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}

	public function addSubElement($subElement){
		if (!isset($this->subElements)){
			$this->subElements=array();
		}
		$this->subElements[]=$subElement;
	}

	public function getSubElements()
	{
		if (!isset($this->subElements)){
			return array();
		}
	    return $this->subElements;
	}
	 
	 public function getPosition()
	 {
	     return $this->position;
	 }
	  
	 public function setPosition($position)
	 {
	     $this->position = $position;
	     return $this;
	 }

	 public function getContent()
	 {
	     return $this->content;
	 }
	  
	 public function setContent($content)
	 {
	     $this->content = $content;
	     return $this;
	 }

}