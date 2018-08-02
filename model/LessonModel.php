<?php

class LessonModel{
	
	public static function isAllowed($sessionGroupId,$menu, $lesson){
		return count(self::getAllLessonsForMenu($menu,$sessionGroupId, $lesson))>0;		
	}

	public static function getAllLessonsForMenu($menu,$sessionGroupId,$lesson){
		$bdd = Database::getDb();		
		$request = "select lesson.code, lesson.title from lesson";

		if (isset($sessionGroupId)){
			$request.=" join lesson_session_group on lesson.lesson_id=lesson_session_group.lesson_id";
		}

		$request.=" join menu_lesson on lesson.menu_lesson_id=menu_lesson.menu_lesson_id"
			." where menu_lesson.code=:menu";
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
		$request = "select * from lesson where code=:code";

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
		$request = "select p.*,lp.page_number as rank "
			." from page p join lesson_page lp on p.page_id=lp.page_id "
		 	." where lp.lesson_id=:id";


var_dump($request);
		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('id'=>$lessonId));
		
		$result=array();
		while ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			$lesson=new Page($data);
			$result[$data['rank']]=$lesson;
		}

		return $lesson;
	}
}