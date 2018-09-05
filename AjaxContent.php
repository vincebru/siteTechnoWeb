<?php

class AjaxContent{
    private static function getValue($array, $key)
    {
        if (isset($array[$key])) {
            return $array[$key];
        }

        return '';
    }
    
    private static function getFileData(){
        
        if (isset($_FILES["file"]) && isset($_FILES["file"]["tmp_name"])){
            $tmpFileName=$_FILES["file"]["tmp_name"];
            $mime=mime_content_type($tmpFileName);//'application/pdf';
            $file=fopen($tmpFileName, 'rb');
            return array('mime'=> $mime,'file'=> $file);
        }
        return array();
    }

    public function render(){
        // get action/page requested
        $menu = 'ajax';
        $page = 'get';
        $pagePath = 'ajax/get';
        $refArray = $_GET;
        $isWriteAction = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $page = 'post';
            $refArray = array_merge($_POST,static::getFileData());
            $isWriteAction = true;
        } elseif ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
            $page = 'patch';
            $refArray = array_merge($_PATCH,static::getFileData());
            $isWriteAction = true;
        } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $page = 'delete';
            $refArray = $_DELETE;
            $isWriteAction = true;
        }
        $object = static::getValue($refArray, 'object');
        $id = static::getValue($refArray, 'id');
    
    
        if ($isWriteAction) {
            if (GlobalModel::isUpdateAllowed($object)) {
                $actionFile = 'action/ajax/'.$page.'.php';
                include 'manageAction.php';
                $pagePath = 'ajax/get';
            } else {
                $pagePath = 'ajax/notAllowed';
            }
        }
    
        $viewFile = 'view/'.$pagePath.'.php';
        if (!file_exists($viewFile)) {
            $pagePath = 'ajax/main';
            logDebug($viewFile." doesn't exist, so the main view will be loaded");
        }
        include 'view/'.$pagePath.'.php';
    }
}