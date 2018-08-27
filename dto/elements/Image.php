<?php

class Image extends Element{

	static protected $elementType=Element::TYPE_IMAGE;

	static protected $width='width';
	static protected $height='height';

	protected static $complementTableName='image';

	static protected function complementPropertyNameList (){
		return array(static::$width, static::$height);
	}

	static protected function propertyNameList (){
		return array_merge(parent::propertyNameList(), static::complementPropertyNameList());
	}

	function __construct($data){
		parent::__construct($data);
	}
}