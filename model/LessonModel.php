<?php

class LessonModel{
	
	public static function isAllowed($sessionGroupId,$menu, $lesson){
		return count(self::getAllLessonsForMenu($menu,$sessionGroupId, $lesson))>0;		
	}

	public static function getAllLessonsForMenu($menu,$sessionGroupId,$lesson){
		$bdd = Database::getDb();		
		$request = "select lesson.element_id, lesson.content, menu_lesson.rank from element lesson";

		if (isset($sessionGroupId)){
			$request.=" join lesson_session_group on lesson.element_id=lesson_session_group.lesson_id";
		}

		$request.=" join element_element menu_lesson on lesson.element_id=menu_lesson.child_id"
			." join menu on menu.element_id=menu_lesson.parent_id"
			." where lesson.type='".Element::TYPE_LESSON
			."' and menu.code=:menu";
		$param=array('menu'=>$menu);

		if (isset($sessionGroupId)){
			$request.=" and session_group_id=:sessionGroupId";
			$param['sessionGroupId']=$sessionGroupId;
		}

		if (isset($lesson)){
			$request.=" and lesson.code=:lesson";
			$param['lesson']=$lesson;
		}
		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute($param);
		
		$result=array();
		while($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			$result[$data['element_id']]=$data['content'];
		}
		return $result;
	}
	
}