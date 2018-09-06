<?php

include_once 'AccesPoint.php';

class Ajax extends AccesPoint{

    private static function getValue($array, $key) {
        if (isset($array[$key])) {
            return $array[$key];
        }

        return '';
    }

    public function display(){
        
        
        // get action/page requested
        $this->page = 'get';
        $pagePath = 'ajax/get';
        $refArray = $_GET;
        $isWriteAction = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->page = 'post';
            if (isset($_POST['action'])){
                // action could be Move/Patch/Delete
                $this->page = $_POST['action'];
            }
            $refArray = array_merge($_POST,static::getFileData());
            $isWriteAction = true;
        }
        
        $this->executionResult = static::getValue($refArray, 'id');

        if ($isWriteAction) {
            try{
                $this->manageAction($refArray);
                $pagePath = 'ajax/get';
            }catch (Exception $e){
                logDebug('Error ('.$e->getMessage().') occured on '.$this->page.', so the main view will be loaded');
                logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$this->page);
                echo($e->getMessage());
                vardumpDebug($e->getTrace());
                $pagePath = 'ajax/notAllowed';
            }
        }
        
        $id=$this->executionResult;
        $object = $refArray['object'];

        $viewFile = 'view/'.$pagePath.'.php';
        if (!file_exists($viewFile)) {
            $pagePath = 'ajax/main';
            logDebug($viewFile." doesn't exist, so the main view will be loaded");
        }
        include 'view/'.$pagePath.'.php';
    }
}

$renderer= new Ajax();

$renderer->render();

