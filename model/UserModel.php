<?php
class UserModel{

	private static $connectedUser;

	public static function init(){
		if (!isset(self::$connectedUser) && isset($_SESSION['userId'])){
			self::$connectedUser=self::getUserFromId($_SESSION['userId']);
		}
	}
	
	public static function getConnectedUser(){
	    return self::$connectedUser;
	}

	public static function isGroupOfConnectedUser($groupId){
	    if (!isset(self::$connectedUser)) {
	        return false;
	    }
	    $connectedGroupId=self::$connectedUser->getWorkGroupId();
	    return $connectedGroupId==$groupId;
	}
	
	
	/*
	define the user in session. To use from login page
	*/
	public static function logUser($userId){
		$_SESSION['userId'] = $userId;
		self::init();
	}

	/*
	To check if a user is connected
	*/
	public static function isConnected(){
		return isset(self::$connectedUser);
	}

	/*
	To logout the current user
	*/
	public static function disconnect(){
		$_SESSION['userId']=null;
		self::$connectedUser=null;
		logDebug("user is disconnected");
	}

	/*
	Get the user name of the current user if there's one
	*/
	public static function getCurrentUserName(){
		if (self::isConnected()){
			return self::$connectedUser->getFirstname();
		}
		return "";
	}

	/*
	Get the user name of the current user if there's one
	*/
	public static function getCurrentRole(){
		if (self::isConnected()){
			return self::$connectedUser->getRole();
		}
		return "";
	}

	public static function getCurrentSessionGroupId(){
		if (self::isConnected()){
			return self::$connectedUser->getSessionGroupId();
		}
		return "";
	}

	public static function isAdminConnectedUser(){
		return RoleModel::isAdmin(self::getCurrentRole());
	}

	/*
	get user inforation from database
	@id user id to look for in database
	*/
	public static function getUserFromId($id) {

		$bdd = Database::getDb();
		$request = "select u.*,r.code as role"
			." from user u"
			." join role r on r.role_id=u.role_id"
			." where u.user_id=:id";
		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('id'=>$id));
		
		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return new User($data);
		}
		return "";
	}

	/*
	Get user information from database if login/password is correct 
	@login user login
	@password user password
	*/
	public static function getUserFromLoginClearPwd($login,$password){
		$bdd = Database::getDb();	
		$request = "select u.*,r.code as role"
			." from user u"
			." join role r on r.role_id=u.role_id"
			." where u.login=:login"
			." and u.password=:pwd";

		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('login'=>$login,'pwd'=>User::cryptPassword($password)));
		
		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return new User($data);
		}
		return null;
	}

	/*
	check ifg user login is allready used
	@login user login
	*/
	public static function isLoginAlreadyUsed($login) {
		
			$bdd = Database::getDb();	
			$request = "select user_id from user where login=:login";
			$preparedRequest = $bdd->prepare($request);
			$preparedRequest->execute(array('login'=>$login));
			
			if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
				return true;
			}
		return false;
	}


	/*
	check ifg user email is allready used
	@login user login
	*/
	public static function isEmailUserAlreadyUsed($email) {
		
		$bdd = Database::getDb();		
		$request = "select user_id from user where email=:email";
			$preparedRequest = $bdd->prepare($request);
			$preparedRequest->execute(array('email'=>$email));
			
			if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return true;
		}
		return false;

	}
	/*
	Create user into database and log him
	@login user login 
	@password user password
	@firstname user firstname
	@lastname user last name
	@email user email address
	*/
	public static function addUser($login,$password,$firstname,$lastname,$email){
		$bdd = Database::getDb();	
		$req = $bdd->prepare(
			'insert into user (login,firstname,lastname,email,password,role_id) 
				values (:login,:firstname,:lastname,:email,:password,:role_id)');

	 	$req->execute(array(
			'login' => $login,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
	 	    'password' => User::cryptPassword($password),
			'role_id' => RoleModel::getRoleId(RoleModel::ROLE_STUDENT)
			));
		$userId=$bdd->lastInsertId();
		self::logUser($userId);
	}
	
	public static function updatePassword($user, $password){
	    $bdd = Database::getDb();
	    $req = $bdd->prepare(
	        "update user set `password`=:pwd ".
                "where user_id=:id");
	    
	    
	    
	    $req->execute(array(
	        'pwd' => User::cryptPassword($password),
	        'id' => $user->getId()
	    ));
	}

}