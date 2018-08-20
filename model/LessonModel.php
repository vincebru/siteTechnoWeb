<?php

class LessonModel{
	
	public static function isAllowed($sessionGroupId,$menu, $lesson){
		return count(self::getAllLessonsForMenu($menu,$sessionGroupId, $lesson))>0;		
	}

	public static function getAllLessonsForMenu($menu,$sessionGroupId,$lesson){
		$bdd = Database::getDb();		
		$request = "select lesson.code, lesson.title from element lesson";

		if (isset($sessionGroupId)){
			$request.=" join lesson_session_group on lesson.element_id=lesson_session_group.lesson_id";
		}

		$request.=" join element_element menu_lesson on lesson.element_id=menu_lesson.child_id"
			." join element menu on menu.element_id=menu_lesson.parent_id"
			." where menu.type='".Element::TYPE_MENU."' and lesson.type='".Element::TYPE_LESSON."' and menu.code=:menu";
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
			$result[$data['title']]=$data['code'];
		}
		return $result;
	}
	
	public static function getLessonWithPages($lessonCode){
		$bdd = Database::getDb();		
		$request = "select lesson.element_id, lesson.code, lesson.title"
			." from element lesson"
			." where lesson.type='".Element::TYPE_LESSON."' and code=:code";

		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('code'=>$lessonCode));
		
		$lesson=null;
		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			$lesson=new Lesson($data);
			$lesson->setPageList(self::getPagesListForLesson($lesson->getId()));
		}

		return $lesson;
	}

	private static function getPagesListForLesson($lessonId){
		$bdd = Database::getDb();		
		$request = "select p.element_id, p.*,lp.rank"
			." from element p join element_element lp on p.element_id=lp.child_id "
		 	." where p.type='".Element::TYPE_PAGE."' and lp.parent_id=:id";

		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('id'=>$lessonId));
		
		$result=array();
		while ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			$page=new Page($data);
			$result[$data['rank']]=$page;
		}

		return $result;
	}
}