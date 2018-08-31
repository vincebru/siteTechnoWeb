<?php
    // get action/page requested
    $menu = null;
    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];
    } elseif (isset($_POST['menu'])) {
        $menu = $_POST['menu'];
    }

    $page = 'Main';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } elseif (isset($_POST['page'])) {
        $page = $_POST['page'];
    }

    include 'init.php';
    $args = array();

    //control page access
    if (!RoleModel::isAllowed($menu, $page)) {
        $pagePath = 'NotAllowedView';
    }

    try {
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
        if (class_exists($menu)) {
            $pagePath = $menu;
        } else {
            $pagePath = 'MainView';
        }
        logDebug('The main view will be loaded');
    }
    logDebug('load '.$pagePath.' view for page '.$page.'.');

    $args['page'] = $page;
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
