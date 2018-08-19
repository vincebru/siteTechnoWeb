<?php

abstract class DTO{

	protected static $isRequestable;
	protected static $isAdminRequestable;
	protected static $tableName;
	protected static $colId;

	public static function isRequestable()
	{
	    return static::$isRequestable;
	}
	public static function isAdminRequestable()
	{
	    return static::$isAdminRequestable;
	}
	
	public static function getRequestById(){
		return "select * from ".static::$tableName." where ".static::$colId."=:id";
	}

	public function getHtml(){
	}
}