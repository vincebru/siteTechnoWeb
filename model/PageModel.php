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
		if (RoleModel::isAllowed('lessons', null)) {
			$result [] = new MenuLink('Lessons','Lesson',
				LessonModel::getAllLessonsForMenu('Lesson', UserModel::isAdminConnectedUser() ? null : UserModel::getCurrentSessionGroupId(), null));

		}

		// exercices menu
		if (RoleModel::isAllowed('exercices', null)) {
			$result [] = new MenuLink('Exercices','Exercice',
				LessonModel::getAllLessonsForMenu('Exercice', UserModel::isAdminConnectedUser() ? null : UserModel::getCurrentSessionGroupId(), null));
		}

		// result menu
		if (RoleModel::isAllowed('results','results')) {
			$result [] = new MenuLink('Result','ResultsView',null);
		}

		//contact menu
		if (RoleModel::isAllowed('contact',null)) {
				$result [] = new MenuLink('Contact','ContactView',null);;
		}

		// admin menu
		if (RoleModel::isAllowed('admin',null)) {
			$result [] = new MenuLink('Admin','Admin',
				array('adminPage' => 'Page Administration'));
		}

		return $result;
	}



}