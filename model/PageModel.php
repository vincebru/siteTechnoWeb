<?php

class PageModel
{
    const ADMIN_EXERCICES = 'Exercices';
    const ADMIN_LESSONS = 'Lessons';

    public static function isAdminPage($pagetName)
    {
        return $pagetName == self::ADMIN_EXERCICES || $pagetName == self::ADMIN_LESSONS;
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

        // lesson menu
        if (RoleModel::isAllowed('lessons', null)) {
            $result[] = new MenuLink('Lesson','Lesson',
                LessonModel::getAllLessonsForMenu('Lesson', UserModel::isAdminConnectedUser() ? null : UserModel::getCurrentSessionGroupId(), null));
        }

        // exercices menu
        if (RoleModel::isAllowed('exercices', null)) {
            $result[] = new MenuLink('Exercice','Exercice',
                LessonModel::getAllLessonsForMenu('Exercice', UserModel::isAdminConnectedUser() ? null : UserModel::getCurrentSessionGroupId(), null));
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
                array('Lessons' => 'Lessons',
                    'Exercices' => 'Exercices',
                    'Marks' => 'Marks',
                    'Users' => 'Users',
                    'Groups' => 'Groups',
                    'Sessions' => 'Sessions',
                ));
        }

        return $result;
    }
}
