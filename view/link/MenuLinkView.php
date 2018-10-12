<?php
class MenuLinkView extends AbstractLinkView
{
    
    private $elementId;
    
    const PROPERTY_ID = 'id';
    
    public function __construct($args)
    {
        $this->elementId = $args[self::PROPERTY_ID];
        $args[ElementView::PROPERTY_ELEMENT_KEY] = CacheElementsManager::getElement($this->elementId);
        $args[AbstractLinkView::PROPERTY_MENU]=$args[ElementView::PROPERTY_ELEMENT_KEY]->getParentId();
        parent::__construct('MenuView', $args);
    }
    
    /*
    'mode' => string 'Edit' (length=4)
  'element_id' => string '3' (length=1)
  'page' => string 'AdminElement' (length=12)
  'menu' => string 'Admin' (length=5)
  'label' => string 'Lesson' (length=6)
    *
    *
    **/
    
    public static function getInstance($page, $lessonId){
        $element = CacheElementsManager::getElement($lessonId);
        $menu = CacheElementsManager::getElement($element->getParentId());
        $param=array(self::PROPERTY_ID => $lessonId,
            AbstractLinkView::PROPERTY_MENU => $menu->getCode(),
            AbstractLinkView::PROPERTY_PAGE => 'Menu',
            AbstractLinkView::PROPERTY_LABEL => $page
        );
        return new MenuLinkView($param);
    }
    
    public function getUrl(){        
        return parent::getUrl()."&".self::PROPERTY_ID."=".$this->elementId;
    }
    
    public function isSamePage($otherView){
        if($this->getPage() == null || $otherView->getPage() == null || !($otherView instanceof MenuLinkView)) {
            return false;
        }
        return $this->isSameMenu($otherView) && $otherView->getPage() == $this->page
            && $otherView->getElementId() == $this->getElementId();
    }

      
    /**
     * @return ElementId
     */
    public function getElementId()
    {
        return $this->elementId;
    }


    
    
}
