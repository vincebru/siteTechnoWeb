<?php

abstract class AbstractLinkView extends AbstractView {
    
    protected $menu;
    protected $page = null;
    private $view =null;
    protected $viewClass;
    
    
    const PROPERTY_MENU = 'menu';
    const PROPERTY_PAGE = 'page';
    const PROPERTY_LABEL = 'label';
    
    public function __construct($viewClass, $args)
    {
        parent::__construct($args);
        $this->menu = $args[AbstractLinkView::PROPERTY_MENU];
        if (isset($args[AbstractLinkView::PROPERTY_PAGE])){
            $this->page = $args[AbstractLinkView::PROPERTY_PAGE];
        }
        $this->viewClass = $viewClass;
        
        $this->jsFiles = $this->getview()->getJsFiles();
        $this->cssFiles = $this->getview()->getCssFiles();
    }
    
    public function getLabel(){
        if (isset($this->args[self::PROPERTY_LABEL] )){
            return $this->args[self::PROPERTY_LABEL];
        }
        return '';
    }
    
    public function getUrl(){
        if($this->page != null) {
            return 'index.php?page='.$this->page.'Link';
        }
        return 'index.php?page='.$this->menu.'Link';
    }
    
    public function isSameMenu($otherView){
        return $otherView->getMenu() == $this->menu;
    }
    
    public function isSamePage($otherView){
        if($this->page == null || $otherView->getPage() == null) {
            return false;
        }
        return $this->isSameMenu($otherView) && $otherView->getPage() == $this->page;
    }
    
    
    public function checkAllowed() {
        $this->getView()->checkAllowed();
    }
    
    public function getMenu()
    {
        return $this->menu;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setMenu($menu)
    {
        $this->menu = $menu;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }
    
    public function getHtml(){
        $this->getView()->getHtml();
    }
    
    public function getView(){
        if($this->view == null){
            $this->view = new $this->viewClass($this->args);
        }
        return $this->view;
    }
    
    
}