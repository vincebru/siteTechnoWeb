<?php

include_once 'AccessPoint.php';

class Ajax extends AccessPoint{

    private static function getValue($array, $key) {
        if (isset($array[$key])) {
            return $array[$key];
        }

        return '';
    }

    protected function display(){        
        // get action/page requested
        $this->page = 'get';
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
            }catch (Exception $e){
                logDebug('Error ('.$e->getMessage().') occured on '.$this->page.', so the main view will be loaded');
                logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$this->page);
                echo($e->getMessage());
                vardumpDebug($e->getTrace());
                $this->page = 'NotAllowed';
            }
        }
        
        
        if (!class_exists($this->page.'View')){
            $this->page = 'MainAjax';
            logDebug('The main view will be loaded. Class '.$this->page.'View does not exist :/ ');
        }
        $class=$this->page.'View';
        $refArray['page'] = $this->page;
        $this->view = new $class($refArray);
        
        try {
            $this->contentHtml = $this->view->getViewHtml();
        } catch (Exception $e) {
            logDebug('Error ('.$e->getMessage().') occured on '.$this->page.', so the main view will be loaded');
            logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$this->page);
            $refArray['errorMessage'] = $e->getMessage();
            $refArray['stack'] = $e->getTrace();
            $pagePath = 'ErrorView';
            $this->view = new $pagePath($refArray);
            $this->contentHtml = $this->view->getViewHtml();
        }
        
        $this->getHtml();
        
    }
    
    
    public function getHtml(){
        // load content view file
        echo $this->contentHtml;
    }
}




$renderer= new Ajax();

$renderer->render();

