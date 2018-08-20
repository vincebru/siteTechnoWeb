<?php

class Menu extends Element{

	static protected $colType=Element::TYPE_MENU;

	private $code;

	public function getCode()
	{
	    return $this->code;
	}
	 
	public function setCode($code)
	{
	    $this->code = $code;
	    return $this;
	}


}