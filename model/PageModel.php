<?php

class PageModel{

	/*
		check user rights
		return array of array
		menu Label => {
				menu link => {
					sub menu label => sub menu link
				}
		}
		if there's no submenu, submenu array is set to false
	*/
	public static function getMenu(){
		$result = array();

		// lesson menu
		if (RoleModel::isAllowed('lessons',null)) {
			$result [] = new MenuLink('Lessons','Lessons',LessonModel::getAllLessonsForMenu('Lessons',
					UserModel::isAdminConnectedUser()?null:UserModel::getCurrentSessionGroupId(),null));

		}

		// exercices menu
		if (RoleModel::isAllowed('exercices',null)) {
			$result [] = new MenuLink('Exercices','Exercices',LessonModel::getAllLessonsForMenu('Exercices',
					UserModel::isAdminConnectedUser()?null:UserModel::getCurrentSessionGroupId(),null));
		}

		// result menu
		if (RoleModel::isAllowed('results','results')) {
			$result [] = new MenuLink('Result','Results',null);
		}

		//contact menu
		if (RoleModel::isAllowed('contact',null)) {
				$result [] = new MenuLink('Contact','Contact',null);;
		}

		// admin menu
		if (RoleModel::isAllowed('admin',null)) {
			$result [] = new MenuLink('Admin','Admin',
				array('adminPage' => 'Page Administration'));
		}

		return $result;
	}



}