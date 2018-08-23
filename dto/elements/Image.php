<?php

class Image extends Element{

	static protected $colType=Element::TYPE_IMAGE;

	private $width;
	private $height;

	function __construct($data){
		self::constructFromValue($data['element_id'],$data['content'],$data['position']);
		$this->width = $data['width'];
		$this->height = $data['height'];
	}

	public function getWidth()
	{
	    return $this->width;
	}
	 
	public function setWidth($width)
	{
	    $this->width = $width;
	    return $this;
	}

	public function getHeight()
	{
	    return $this->height;
	}
	 
	public function setHeight($height)
	{
	    $this->height = $height;
	    return $this;
	}
}