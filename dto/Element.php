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
	static protected $colType;
	static protected $isAdminUptable=true;

	static protected $id='element_id';
	static protected $type='type';
	static protected $content='content';
	static protected $position='rank';

	static protected function propertyNameList (){
		return array(static::$id,
			static::$type, 
			static::$content, 
			static::$position);
	}

	private static $subElements;
	

	function __construct($data){
		$data[static::$type]=static::$colType;
		parent::__construct($data);
	}

	public static function getRequestById(){
		return "select * from ".static::$tableName.
			" where ".
			static::$id."=:id and type='".static::$colType."'";
	}

	public static function getRequestSubElementById(){
		return "select * from ".static::$tableName." where parent_id=:id";
	}

	public static function getInsertRequests(){
		return array("insert into ".static::$tableName." (type, content, parent_id,rank) ".
			"values (:object,:content,:parent_id,:rank)");
	}

	public static function getPatchrequest(){
		return "update ".static::$tableName." set ".static::$UPDATE_FIELD_KEY." where ".static::$id." = :id";
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

}