<?php
class Database{
	private static $db;

	public static function getDb()
	{
		if(!isset(self::$db)){
			try {
			    self::$db=new PDO('mysql:host=localhost;dbname=siteTechnoWeb;charset=utf8', 'root', 'tomate',
			        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch (Exception $e){
				logDebugAndDie ($e->getMessage());
			}
		}
	    return self::$db;
	}
	 
}