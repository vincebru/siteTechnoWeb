<?php 

class AdminMenuLinkView extends AbstractLinkView {
    
    private $menuId;
    
    public static function getInstance($menuCode){
        
        $menuId = PageModel::getMenuIdFromCode($menuCode);        
        $param=array('edit' => true,
            AdminMenuView::PROPERTY_MENU_ID => $menuId,
            AbstractLinkView::PROPERTY_LABEL => $menuCode
        );
        return new AdminMenuLinkView($param);
    }
    
    
    public function __construct($args)
    {
        $args[AbstractLinkView::PROPERTY_MENU]= 'Admin';
        $args[AbstractLinkView::PROPERTY_PAGE]= 'AdminMenu';
        parent::__construct('AdminMenuView', $args);
        $this->menuId=$args[AdminMenuView::PROPERTY_MENU_ID];
    }
    
    public function getUrl(){
        return parent::getUrl()."&".AdminMenuView::PROPERTY_MENU_ID."=".$this->menuId;
    }
    
    public function isSamePage($otherView){
        if($this->getPage() == null || $otherView->getPage() == null || !($otherView instanceof MenuLinkView)) {
            return false;
        }
        return $this->isSameMenu($otherView) && $otherView->getPage() == $this->page
        && $otherView->getElementId() == $this->getElementId();
    }
    
    
}