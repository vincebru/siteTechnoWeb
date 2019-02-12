<?php

abstract class Element extends DTO{

	public static $UPDATE_FIELD_VALUES="content = :content";

	const TYPE_MENU='Menu';
	const TYPE_LESSON='Lesson';
	const TYPE_PAGE='Page';
	const TYPE_FORM='Form';
	const TYPE_PARAGRAPH='Paragraph';
	const TYPE_LINK='Link';
	const TYPE_IMAGE='Image';
	const TYPE_FILE='File';
	const TYPE_TITLE='Title';
	const TYPE_INPUT='Input';
	const TYPE_INPUT_FILE='InputFile';
	const TYPE_TABLE='Table';
	const TYPE_TABLE_ROW='TableRow';
	const TYPE_TABLE_CELL='TableCell';
	const TYPE_CODE='Code';
	const TYPE_UL='Ul';
	const TYPE_LI='Li';
	const TYPE_INCLUDE_CODE='IncludeCode';

	protected static $complementTableName=null;

	static protected $tableName="element";
	static protected $elementType;
	static protected $isAdminUptable=true;

	static protected $id='element_id';
	static public $type='type';
	static protected $content='content';
	static protected $parentId='parent_id';
	static protected $position='rank';

	static protected function propertyNameList (){
		return array(static::$id,
			static::$type, 
			static::$content,
		    static::$parentId,
			static::$position);
	}

	private $subElements;

	function __construct($data){
		$data[static::$type]=static::$elementType;
		parent::__construct($data);
	}
	
	public static function isRootElements($elementName){
		return $elementName == self::TYPE_LESSON ;
	}
	
	public static function getSelectRequest(){
	    return parent::getSelectRequest() . " and main.type='" . static::$elementType . "'";
	}
	
	public static function getRequestById(){
		return parent::getRequestById() . " and main.type='" . static::$elementType . "'";
	}
	

	public static function getRequestSubElementById(){
	    return "select * from ".strtolower(static::$tableName)." where parent_id=:id";
	}
	public static function getInsertRequests(){
	    return array("insert into ".static::$tableName." (type, content, parent_id,rank) ".
	        "values (:object,:content,:parent_id,:rank)");
	}
	public static function getPatchRequest(){
	    if (static::$complementTableName == null){
			return "update ".static::$tableName." set ".static::$UPDATE_FIELD_KEY." where ".static::$id." = :id";
		} else {
			return "update ".static::$tableName." as elt, ".static::$complementTableName." as cmp set ".static::$UPDATE_FIELD_KEY.
			 " where elt.".static::$id." = :id and elt.".static::$id." = cmp.".static::$id;
		}
	}
	
    public static function getRemoveRequests(){
        
        $result= array("delete from ".strtolower(static::$tableName)." where ".static::$id." = :id");
        if (static::$complementTableName != null){
            return array_merge($result,
                array("delete from ".strtolower(static::$complementTableName)." where ".static::$id." = :id"));
        }
        return $result;
    }

	public function getType(){
	    return $this->get(static::$type);
	}

	public function getId(){
		return $this->get(static::$id);
	}

    public function getElementType()
    {
        return static::$elementType;
    }

    public function getContent(){
		return $this->get(static::$content);
	}
	
	public function getPosition(){
	    return $this->get(static::$position);
	}
	
	public function getParentId(){
	   return $this->get(static::$parentId);    
	}
	
	public function addSubElement($subElement){
		if (!isset($this->subElements)){
			$this->subElements=array();
		}
		$this->subElements[$subElement->getPosition()]=$subElement->getId();
		ksort($this->subElements);
	}

	public function getSubElements()
	{
		if (!isset($this->subElements)){
			return array();
		}
	    return $this->subElements;
	}

}
