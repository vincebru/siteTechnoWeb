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
			$result [] = new MenuLink('Lessons','lessons',LessonModel::getAllLessonsForMenu('lessons',
					UserModel::isAdminConnectedUser()?null:UserModel::getCurrentSessionGroupId(),null));

		}

		// exercices menu
		if (RoleModel::isAllowed('exercices',null)) {
			$result [] = new MenuLink('Exercices','exercices',LessonModel::getAllLessonsForMenu('exercices',
					UserModel::isAdminConnectedUser()?null:UserModel::getCurrentSessionGroupId(),null));
		}

		// result menu
		if (RoleModel::isAllowed('results','results')) {
			$result [] = new MenuLink('Result','results',null);
		}

		//contact menu
		if (RoleModel::isAllowed('contact',null)) {
				$result [] = new MenuLink('Contact','contact',null);;
		}

		// admin menu
		if (RoleModel::isAllowed('admin',null)) {
			$result [] = new MenuLink('Admin','admin',
				array('adminPage' => 'Page Administration'));
		}

		return $result;
	}



}