<?php

class RoleModel{

	const ROLE_STUDENT='STUDENT';
	const ROLE_ADMIN='ADMIN';
	

	public static function isAdmin($role){
		return self::ROLE_ADMIN == $role;
	}

	public static function getRoleId($code){
		$bdd = Database::getDb();		
		$request = "select role_id from role where code=:code";
		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('code'=>$code));
		
		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return $data['role_id'];
		}
		return "";
	}

	public static function isAllAllowed($page) {
		return !isset(Config::$PAGE_RIGHTS[$page]);
	}
	
	public static function isAllowed ($menu,$page){

		$currentRole=UserModel::getCurrentRole();

		$pageToCheckInRights=$page;

		$isAllowed=true;

		if(!Usermodel::isAdminConnectedUser()) {
			if (in_array($menu, Config::$MENU_WITH_LESSON)){
				$currentSessiongroupId=UserModel::getCurrentSessionGroupId();
				//check than session group can access to the page
				$isAllowed = LessonModel::isAllowed($currentSessiongroupId, $menu, $page);
				$pageToCheckInRights=null;
			}
		}

		if ($isAllowed && !Config::$PAGE_RIGHTS->isAllowed($currentRole,$menu,$pageToCheckInRights)){
			return false;
		}

		return $isAllowed;
	}

}