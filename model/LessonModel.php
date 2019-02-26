<?php

class LessonModel
{
    public static function isAllowed($sessionGroupId, $menu, $lesson)
    {
        return count(self::getAllLessonsForMenu($menu, $sessionGroupId, $lesson)) > 0;
    }

    public static function getAllLessonsForMenu($menu, $sessionGroupId, $lesson)
    {
        $bdd = Database::getDb();

        $request = 'SELECT lesson.element_id, lesson.content, lesson.rank FROM menu ';


        $request .= ' JOIN element lesson ON lesson.parent_id = menu.element_id ';
        
        $request .= ' LEFT JOIN lesson_session_group ON lesson.element_id = lesson_session_group.lesson_id ';
        
        $request .= ' WHERE 1=1 ';
        
        if ($menu != null) {
            $request .= ' AND menu.code = :menu ';
    
            $param = array('menu' => $menu);
        }

        if (isset($sessionGroupId)) {
            $request .= ' AND session_group_id = :sessionGroupId ';
            $param['sessionGroupId'] = $sessionGroupId;
        } else {
            $request .= ' AND session_group_id is null ';
        }

        if (isset($lesson)) {
            $request .= ' AND lesson.element_id = :lesson ';
            $param['lesson'] = $lesson;
        }

        $request .= ' ORDER BY lesson.rank ';

        
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute($param);

        $result = array();
        while ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            $result[] = CacheElementsManager::getElement($data['element_id']);
        }

        return $result;
    }

    public static function getAllElementsForAdmin($elementType)
    {
        $bdd = Database::getDb();

        $request = 'SELECT lessons.element_id, lessons.content, lessons.rank ';
        $request .= ' FROM menu ';
        $request .= ' JOIN element lesson ON lesson.element_id = menu.element_id ';
        $request .= ' JOIN element lessons ON lessons.parent_id = menu.element_id ';
        $request .= ' WHERE menu.code = :elementType ';
        $param['elementType'] = $elementType;
        $request .= ' ORDER BY lessons.rank ';

        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute($param);

        $result = array();
        while ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            $result[$data['element_id']] = $data['content'];
        }

        return $result;
    }
    
    
    public static function getLessonParent($element){
        if ($element instanceof Lesson){
            return $element;
        } else {
            return self::getLessonParent(GlobalModel::getElementParent($element));
        }
    }
    /**
     * retourne un tableau array($lessonName=> array($from))
     */
    public static function getFormForSession($sessionGroupId){
        
        $lessons = self::getAllLessonsForMenu(null,$sessionGroupId,null);
        $formByLesson = self::getFormByLesson();
        $result=array();
        foreach($lessons as $lesson){
            if (array_key_exists($lesson->getId(),$formByLesson)) {
                if (array_key_exists($lesson->getContent(),$result)) {
                    $result[$lesson->getContent()] = $formByLesson[$lesson->getId()];
                } else {
                    $result[$lesson->getContent()] = $formByLesson[$lesson->getId()];
                }
            }
        }
        return $result;
    }
    
    public static function getFormByLesson(){
        $result=array();
        $allForm = GlobalModel::getAll("Form",null,null);
        foreach ($allForm as $form) {
            $lesson = self::getLessonParent($form);
            if (array_key_exists($lesson->getId(),$result)) {
                $result[$lesson->getId()][] = $form;
            } else {
                $result[$lesson->getId()] = array($form);
            }
        }
        return $result;
    }
}
