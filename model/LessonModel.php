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
        
        if (isset($sessionGroupId)) {
            $request .= ' JOIN lesson_session_group ON lesson.element_id = lesson_session_group.lesson_id ';
        }
        
        $request .= ' WHERE menu.code = :menu ';

        $param = array('menu' => $menu);

        if (isset($sessionGroupId)) {
            $request .= ' AND session_group_id = :sessionGroupId ';
            $param['sessionGroupId'] = $sessionGroupId;
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
}
