<?php

abstract class DTO{

	protected static $isUptable=false;
	protected static $isAdminUptable=false;
	protected static $tableName;
	protected static $colId;

	public static function isUptable()
	{
	    return static::$isUptable;
	}
	public static function isAdminUptable()
	{
	    return static::$isAdminUptable;
	}
	
	public static function getRequestById(){
		return "select * from ".static::$tableName." where ".static::$colId."=:id";
	}
	
	public static function getInsertRequest(){
		return array();
	}

	public function getHtml(){
	}
}