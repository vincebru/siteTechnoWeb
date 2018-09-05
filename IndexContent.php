<?php

class IndexContent{
    public function render(){
        // get action/page requested
        $menu = null;
        if (isset($_GET['menu'])) {
            $menu = $_GET['menu'];
        } elseif (isset($_POST['menu'])) {
            $menu = $_POST['menu'];
        }
    
        $edit = null;
        if (isset($_GET['edit'])) {
            $edit = $_GET['edit'];
        } elseif (isset($_POST['edit'])) {
            $edit = $_POST['edit'];
        }
    
        $page = 'Main';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } elseif (isset($_POST['page'])) {
            $page = $_POST['page'];
        }
    
        $args = array();
    
        //control page access
        if (!RoleModel::isAllowed($menu, $page)) {
            $pagePath = 'NotAllowedView';
        }
        try {
            $actionFile = 'action/'.$page.'.php';
            include 'manageAction.php';
        } catch (Exception $e) {
            logDebug('Error ('.$e->getMessage().') occured on '.$actionFile.', so the main view will be loaded');
            logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$actionFile);
            var_dump($e->getTrace());
            $pagePath = 'MainView';
        }
    
        if (Element::isRootElements($menu)) {
            try {
                logDebug('Query for a root element: '.$menu);
                $args['element'] = GlobalModel::getInstance($menu, $page);
                $pagePath = $menu.'View';
            } catch (Exception $e) {
                logDebug('Error ('.$e->getMessage().') occured on '.$actionFile.', so the main view will be loaded');
                logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$actionFile);
                $args['errorMessage'] = $e->getMessage();
                $args['stack'] = $e->getTrace();
                $pagePath = 'ErrorView';
            }
        } else {
            if (class_exists($menu.'View')) {
                $pagePath = $menu.'View';
                logDebug('The '.$menu.' view will be loaded.');
            } else {
                $pagePath = 'MainView';
                logDebug('The main view will be loaded. Class '.$menu.' does not exist :/ ');
            }
        }
        logDebug('load '.$pagePath.' view for page '.$page.'.');
    
        $args['page'] = $page;
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
    
        $cssToInclude = array_merge($view->getCssFiles(), $header->getCssFiles());
        $jsToInclude = array_merge($view->getJsFiles(), $header->getJsFiles());
    
        $args['cssFiles'] = $cssToInclude;
        $args['jsFiles'] = $jsToInclude;
        $args['headerHtml'] = $header->getViewHtml();
    
        try {
            $args['contentHtml'] = $view->getViewHtml();
        } catch (Exception $e) {
            logDebug('Error ('.$e->getMessage().') occured on '.$actionFile.', so the main view will be loaded');
            logDebug('File: '.$e->getFile().', line: '.$e->getLine().', code: '.$e->getCode().', occured on '.$actionFile);
            $args['errorMessage'] = $e->getMessage();
            $args['stack'] = $e->getTrace();
            $pagePath = 'ErrorView';
            $view = new $pagePath($args);
            $args['contentHtml'] = $view->getViewHtml();
        }
        $indexView = new IndexView($args);
    
        $indexView->getHtml();
    }
}
