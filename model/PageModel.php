<?php

class PageModel
{
    const ADMIN_EXERCICES = 'Exercices';
    const ADMIN_LESSONS = 'Lessons';

    public static function isAdminPage($pagetName)
    {
        return $pagetName == self::ADMIN_EXERCICES || $pagetName == self::ADMIN_LESSONS;
    }

    private static function getMenuList(){
        $bdd = Database::getDb();
        $request = 'select * from Element where type=:menuType';
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('menuType' => Element::TYPE_MENU));
        $result=array();
        while ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            $result[]=GlobalModel::getInstance(Element::TYPE_MENU, $data['element_id']);
        }
        return $result;
    }
    
    
    public static function isMenuElement($code){
        $bdd = Database::getDb();
        $request = 'select element_id from menu where code=:code';
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('code' => $code));
        $result=array();
        if ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            return $data['element_id'];
        }
        return null;
    }
    
    
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
    public static function getMenu()
    {
        $result = array();

        
        $dynamicMenuList=static::getMenuList();
        
        foreach ($dynamicMenuList as  $dynamicMenu){
            // lesson menu
            if (RoleModel::isAllowed($dynamicMenu->getcontent(), null)) {
                $result[] = new MenuLink($dynamicMenu->getcontent(),'DynamicMenu',
                    LessonModel::getAllLessonsForMenu($dynamicMenu->getCode(), UserModel::isAdminConnectedUser() ? null : UserModel::getCurrentSessionGroupId(), null));
            }
        }
        
        // result menu
        if (RoleModel::isAllowed('results', 'results')) {
            $result[] = new MenuLink('Result', 'Result', null);
        }
        
        //contact menu
        if (RoleModel::isAllowed('contact', null)) {
            $result[] = new MenuLink('Contact', 'Contact', null);
        }

        // admin menu
        if (RoleModel::isAllowed('admin', null)) {
            $result[] = new MenuLink('Admin','Admin',
                array('Lesson' => 'Lessons',
                    'Exercice' => 'Exercices',
                    'Marks' => 'Marks',
                    'Users' => 'Users',
                    'Groups' => 'Groups',
                    'Sessions' => 'Sessions',
                ));
        }

        return $result;
    }
}
