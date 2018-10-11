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
        $request = 'select * from element where type=:menuType';
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('menuType' => Element::TYPE_MENU));
        $result=array();
        while ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            $result[]=GlobalModel::getInstance(Element::TYPE_MENU, $data['element_id']);
        }
        return $result;
    }
    
    public static function getMenuIdFromCode($code){
        $bdd = Database::getDb();
        $request = 'select element_id from menu where code=:code ';
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('code' => $code));
        $result=array();
        if ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            return $data['element_id'];
        }
        return null;
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
            // menu
            if (RoleModel::isAllowed($dynamicMenu->getCode(), null)) {
                $currentMenu=array();
                
                foreach (LessonModel::getAllLessonsForMenu($dynamicMenu->getCode(), UserModel::isAdminConnectedUser() ? null : UserModel::getCurrentSessionGroupId(), null) as $lesson){
                    $currentMenu[] = MenuLinkView::getInstance($lesson->getContent(), $lesson->getId());
                }
                if (!empty($currentMenu)){
                    $result[$dynamicMenu->getcontent()] = $currentMenu;
                }
            }
        }
        
        // result menu
        if (RoleModel::isAllowed('results', 'results')) {
            $result['Result'] = array(ResultLinkView::getInstance());
        }
        
        //contact menu
        if (RoleModel::isAllowed('contact', null)) {
            $result['Contact'] =  array(ContactLinkView::getInstance());
        }

        // admin menu
        if (RoleModel::isAllowed('admin', null)) {
            $currentMenu=array();
            foreach ($dynamicMenuList as  $dynamicMenu){
                $currentMenu[] = AdminMenuLinkView::getInstance($dynamicMenu->getcode());
            }
            $currentMenu[] = AdminUserLinkView::getInstance();
            $result['Admin'] = $currentMenu;
            
            //TODO a voir si on ajoute un point de menu pour Marks, Users,Groups, Sessions
        }
        return $result;
    }
}
