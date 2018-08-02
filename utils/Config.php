<?php
class Config{

	/*
	give roles than can access to a page
	if a page is not declared in this array, all connected user can access to the page
	if a page is decaled as ROLE_ALL, all user (even not connected user) can access to the page
	*/
	public static $PAGE_RIGHTS;
	
	public static $MENU_WITH_LESSON = array(
			'lessons','exercices'
		);

}

Config::$PAGE_RIGHTS = new Rights();
Config::$PAGE_RIGHTS->addRights("admin","adminPage",array( RoleModel::ROLE_ADMIN ));
Config::$PAGE_RIGHTS->addRights("lessons",null,array( RoleModel::ROLE_ADMIN,RoleModel::ROLE_STUDENT ));
Config::$PAGE_RIGHTS->addRights("exercices",null,array( RoleModel::ROLE_ADMIN,RoleModel::ROLE_STUDENT ));
Config::$PAGE_RIGHTS->addRights("results","results",array( RoleModel::ROLE_ADMIN,RoleModel::ROLE_STUDENT ));

?>