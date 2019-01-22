<?php

class User extends DTO{

	static protected $tableName="user";
	static protected $isAdminUptable=true;

	static protected $id='user_id';
	static protected $login='login';
	static protected $firstname='firstname';
	static protected $lastname='lastname';
	static protected $email='email';
	static protected $password='password';
	static protected $role='role';
	static public $sessionGroupId='session_group_id';
	static public $workGroupId='work_group_id';
	
	public static $UPDATE_FIELD_VALUES="work_group_id = :work_group_id";

	static protected function propertyNameList (){
		return array(static::$id,
			static::$login,
			static::$firstname,
			static::$lastname,
			static::$email,
			static::$password,
			static::$role,
			static::$sessionGroupId,
			static::$workGroupId
		);
	}

    static public function propertyKeyList() {
        return array(
            new PropertyKey(static::$id,PropertyKey::$MANDATORY),
            new PropertyKey(static::$login, PropertyKey::$MANDATORY),
            new PropertyKey(static::$firstname, PropertyKey::$MANDATORY), 
            new PropertyKey(static::$lastname, PropertyKey::$MANDATORY), 
            new PropertyKey(static::$email, PropertyKey::$MANDATORY),
            new PropertyKey(static::$password, PropertyKey::$MANDATORY),
            new PropertyKey(static::$role, PropertyKey::$MANDATORY),
            new PropertyKey(static::$sessionGroupId, PropertyKey::$MANDATORY),
            new PropertyKey(static::$workGroupId, PropertyKey::$MANDATORY),
        );
    }

	public function getId(){
	    return $this->get(static::$id);
	}
	
	public function getLogin()
	{
	    return $this->get(static::$login);
	}
	 
	public function setLogin($login)
	{
	    $this->set(static::$login, $login);
	    return $this;
	}

	public function getFirstname()
	{
	    return $this->get(static::$firstname);
	}
	 
	public function setFirstname($firstname)
	{
	    $this->set(static::$firstname, $firstname);
	    return $this;
	}

	public function getLastname()
	{
	    return $this->get(static::$lastname);
	}
	 
	public function setLastname($lastname)
	{
	    $this->set(static::$lastname, $lastname);
	    return $this;
	}

	public function getEmail()
	{
	    return $this->get(static::$email);
	}
	 
	public function setEmail($email)
	{
	    $this->set(static::$email, $email);
	    return $this;
	}

	public function getPassword()
	{
	    return $this->get(static::$password);
	}
	 
	public function setPassword($password)
	{
	    $this->set(static::$password, self::cryptPassword($password));
	    return $this;
	}

	public static function cryptPassword($pwd){
		return md5($pwd);
	}

	public function getRole()
	{
	    return $this->get(static::$role);
	}
	 
	public function setRole($role)
	{
	    $this->set(static::$role, $role);
	    return $this;
	}

	public function getSessionGroupId()
	{
	    return $this->get(static::$sessionGroupId);
	}
	 
	public function setSessionGroupId($sessionGroupId)
	{
	    $this->set(static::$sessionGroupId, $sessionGroupId);

	    return $this;
	}

	public function getWorkGroupId()
	{
	    return $this->get(static::$workGroupId);
	}
	 
	public function setWorkGroupId($workGroupId)
	{
	    $this->set(static::$workGroupId, $workGroupId);
	    return $this;
	}

}