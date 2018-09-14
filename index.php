<?php

include_once 'AccesPoint.php';

class Index extends AccesPoint {

    public function display(){
        // get action/page requested
        
        $refArray = $_GET;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $refArray = array_merge($_POST,static::getFileData());
        }
        
        $menu = null;
        if (isset($refArray['menu'])) {
            $menu = $refArray['menu'];
        } 

        $edit = null;
        if (isset($refArray['edit'])) {
            $edit = $refArray['edit'];
        } 

        $this->page = 'Main';
        if (isset($refArray['page'])) {
            $this->page = $refArray['page'];
        } 

        $args = array();
        
        $args['inputParam']=$refArray;
        

        //control page access
        if (!RoleModel::isAllowed($menu, $this->page)) {
            $pagePath = 'NotAllowedView';
        }
        try {
            $this->manageAction($refArray);
        } catch (TechnowebException $e) {
            logDebug('Error ('.$e->getMessage().') occured on '.$this->page.', so the main view will be loaded');
            logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$this->page);
            $args[MainView::MESSAGE_TO_DISPLAY_KEY]=$e->getFunctionnalMessage();
            vardumpDebug($e->getTrace());
            $pagePath = 'MainView';
        } catch (Exception $e) {
            logDebug('Error ('.$e->getMessage().') occured on '.$this->page.', so the main view will be loaded');
            logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$this->page);
            
            echo($e->getMessage());
            vardumpDebug($e->getTrace());
            $pagePath = 'MainView';
        }
        if(!isset($args['inputParam']['id'])){
            $args['inputParam']['id']=$this->executionResult;
        }

        if (Element::isRootElements($menu)) {
            try {
                logDebug('Query for a root element: '.$menu);
                $args['element'] = GlobalModel::getInstance($menu, $this->page);
                $pagePath = $menu.'View';
            } catch (Exception $e) {
                logDebug('Error ('.$e->getMessage().') occured on '.$this->page.', so the main view will be loaded');
                logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$this->page);
                $args['errorMessage'] = $e->getMessage();
                $args['stack'] = $e->getTrace();
                $pagePath = 'ErrorView';
            }
        } else {
            if (class_exists($menu.'View')) {
                $pagePath = $menu.'View';
                logDebug('The '.$menu.' view will be loaded.');
            } else if (class_exists($this->page.'View')){
                $pagePath = $this->page.'View';
                logDebug('The '.$this->page.' view will be loaded.');
            } else {
                $pagePath = 'MainView';
                logDebug('The main view will be loaded. Class '.$menu.' does not exist :/ ');
            }
        }
        logDebug('load '.$pagePath.' view for page '.$this->page.'.');

        $args['page'] = $this->page;
        $args['menu'] = $menu;
        if (isset($edit)) {
            $args['edit'] = $edit;
            $args['mode'] = ElementView::MODE_EDIT;
        } else {
            $args['mode'] = ElementView::MODE_VIEW;
        }
        $header = new Header($args);
        $view = new $pagePath($args);
        logDebug('$view status: '.$view->getStatus().'.');

        try {
            $args['contentHtml'] = $view->getViewHtml();
        } catch (Exception $e) {
            logDebug('Error ('.$e->getMessage().') occured on '.$this->page.', so the main view will be loaded');
            logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$this->page);
            $args['errorMessage'] = $e->getMessage();
            $args['stack'] = $e->getTrace();
            $pagePath = 'ErrorView';
            $view = new $pagePath($args);
            $args['contentHtml'] = $view->getViewHtml();
        }

        $cssToInclude = array_merge($view->getCssFiles(), $header->getCssFiles());
        $jsToInclude = array_merge($view->getJsFiles(), $header->getJsFiles());

        $args['cssFiles'] = $cssToInclude;
        $args['jsFiles'] = $jsToInclude;
        $args['headerHtml'] = $header->getViewHtml();

        $indexView = new IndexView($args);

        $indexView->getHtml();
    }
}

$renderer= new Index();

$renderer->render();
