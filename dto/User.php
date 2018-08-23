<?php

class User extends DTO{

	static protected $tableName="user";
	static protected $colId="user_id";
	static protected $isAdminUptable=true;

	private $id;
	private $login;
	private $firstname;
	private $lastname;
	private $email;
	private $password;
	private $role;
	private $sessionGroupId;
	private $workGroupId;


	function __construct($data){
		self::constructFromValue($data['user_id'],$data['login'],$data['firstname'],
			$data['lastname'],$data['email'],$data['password'],$data['role'],
			$data['session_group_id'],
			$data['work_group_id']);
	}

	public function constructFromValue($id,$login, $firstname, $lastname,$email,$password,
		$role,$sessionGroupId,$workGroupId){
		$this->id=$id;
		$this->login=$login;
		$this->firstname=$firstname;
		$this->lastname=$lastname;
		$this->email=$email;
		$this->password=$password;
		$this->role=$role;
		$this->sessionGroupId=$sessionGroupId;
		$this->workGroupId=$workGroupId;
	}

	public function getId()
	{
	    return $this->id;
	}

	public function getLogin()
	{
	    return $this->login;
	}
	 
	public function setLogin($login)
	{
	    $this->login = $login;
	    return $this;
	}

	public function getFirstname()
	{
	    return $this->firstname;
	}
	 
	public function setFirstname($firstname)
	{
	    $this->firstname = $firstname;
	    return $this;
	}

	public function getLastname()
	{
	    return $this->lastname;
	}
	 
	public function setLastname($lastname)
	{
	    $this->lastname = $lastname;
	    return $this;
	}

	public function getEmail()
	{
	    return $this->email;
	}
	 
	public function setEmail($email)
	{
	    $this->email = $email;
	    return $this;
	}

	public function getPassword()
	{
	    return $this->password;
	}
	 
	public function setPassword($password)
	{
	    $this->password = self::cryptPassword($password);
	    return $this;
	}

	public static function cryptPassword($pwd){
		return md5($pwd);
	}

	public function getRole()
	{
	    return $this->role;
	}
	 
	public function setRole($role)
	{
	    $this->role = $role;
	    return $this;
	}

	public function getSessionGroupId()
	{
	    return $this->sessionGroupId;
	}
	 
	public function setSessionGroupId($sessionGroupId)
	{
	    $this->sessionGroupId = $sessionGroupId;

	    return $this;
	}

	public function getWorkGroupId()
	{
	    return $this->workGroupId;
	}
	 
	public function setWorkGroupId($workGroupId)
	{
	    $this->workGroupId = $workGroupId;
	    return $this;
	}

}