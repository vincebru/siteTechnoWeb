<?php

abstract class ElementView extends AbstractView
{

    const ACTION_ADD = 'Add';
    const ACTION_EDIT = 'Edit';
    const ACTION_REMOVE = 'Remove';
    
    const PROPERTY_ELEMENT_KEY='element';
    
    
    protected $mode;
    protected $element;
    
    protected $subViews;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->element = $args[self::PROPERTY_ELEMENT_KEY];
        $this->subViews=array();
        foreach ($this->element->getSubElements() as $subElement) {
            $this->subViews[]=$this->getSubView($subElement);
        }
    }
    
    public function checkAllowed() {
        $parentLesson = LessonModel::getLessonParent($this->element);
        $parentMenu = GlobalModel::getElementParent($parentLesson);
        
        if(! RoleModel::isAllowed($parentMenu->getCode(),$parentLesson->getId())){
            $message = "NotAllowed";
            throw new TechnowebException($message, $message);
        }
        return true;
    }

    public function getHtml()
    {
        $this->render();
    }

    public function getOutlineHtml()
    {
        $this->renderOutline();
    }

    protected function getElement()
    {
        return $this->element;
    }

    protected function isEdition()
    {
        return isset($this->args['edit']);
    }

    protected function renderChildren()
    {
        logDebug('Element '.$this->element->getType().' -  HTML: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach ($this->subViews as $subView) {
            $html = $html.$subView->getHtml();
        }

        return $html;
    }

    protected function renderChildrenOutline()
    {
        logDebug('Element '.$this->element->getType().' - Outline: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach ($this->subViews as $subView) {
            $html = $html.$subView->getOutlineHtml();
        }

        return $html;
    }

    abstract protected function render();

    abstract protected function renderOutline();


    public function getModalHtml($action)
    {
        ob_start();
        $this->buildModalHtmlContent($action);
        $modalHtml = ob_get_contents();
        ob_end_clean();

        $modalHtml = str_replace("\n", "", $modalHtml);
        $modalHtml = str_replace("  ", "", $modalHtml);

        return $modalHtml;
    }

    abstract protected function buildModalHtmlContent($action);

    private function getSubView($subElementId)
    {
        $subElement = CacheElementsManager::getElement($subElementId);

        $subViewType = $subElement->getType().'View';
        $viewArg = array();
        $viewArg[ElementView::PROPERTY_ELEMENT_KEY] = $subElement;
        if ($this->isEdition()){
            $viewArg['edit'] = true;
        }
        $subView = new $subViewType($viewArg);

        $this->jsFiles = array_merge($this->jsFiles, $subView->getJsFiles());
        $this->cssFiles = array_merge($this->cssFiles, $subView->getCssFiles());

        return $subView;
    }
}
