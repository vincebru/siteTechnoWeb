<?php

class Role extends DTO{

	static protected $tableName = 'role';
	static protected $id = 'role_id';
	static protected $isAdminUptable = true;

	static protected $code='code';
	static protected $name='name';

	static protected function propertyNameList (){
		return array(static::$id,
			static::$code,
			static::$name
		);
	}

    static public function propertyKeyList() {
        return array(
            new PropertyKey(static::$code,PropertyKey::$MANDATORY),
            new PropertyKey(static::$name, PropertyKey::$MANDATORY)
        );
    }

	public function setId($id)
	{
	    $this->set(static::$id, $id);

	    return $this;
	}

	public function getCode()
	{
	    return $this->get(static::$code);
	}
	 
	public function setCode($code)
	{
	    $this->set(static::$code, $code);
	    return $this;
	}

	public function getName()
	{
	    return $this->get(static::$name);
	}
	 
	public function setName($name)
	{
	    $this->set(static::$name, $name);
	    return $this;
	}
}