<?php

abstract class ElementView extends AbstractView
{
    const MODE_EDIT = 'Edit';
    const MODE_VIEW = 'View';

    const ACTION_ADD = 'Add';
    const ACTION_EDIT = 'Edit';
    const ACTION_REMOVE = 'Remove';

    protected $mode;
    protected $element;
    protected $actions;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->element = $args['element'];
        $this->mode = $args['mode'];
        $this->actions = array(ElementView::ACTION_EDIT);
    }

    public function getHtml()
    {
        $this->render();
    }

    public function getOutlineHtml()
    {
        $this->renderOutline();
    }

    public function getModals()
    {
        $array = array();
        $array[$this->element->getElementType()] = $this->actions;

        foreach ($this->element->getSubElements() as $subElement) {
            $subView = $this->getSubView($subElement);
            $array = array_merge($array, $subView->getModals());
        }

        return $array;
    }

    protected function getElement()
    {
        return $this->element;
    }

    protected function isEdition()
    {
        return $this->mode == ElementView::MODE_EDIT;
    }

    protected function renderChildren()
    {
        logDebug('Element '.$this->element->getType().' -  HTML: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach ($this->element->getSubElements() as $subElement) {
            $subView = $this->getSubView($subElement);
            $html = $html.$subView->getHtml();
        }

        return $html;
    }

    protected function renderChildrenOutline()
    {
        logDebug('Element '.$this->element->getType().' - Outline: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach ($this->element->getSubElements() as $subElement) {
            $subView = $this->getSubView($subElement);
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
        $viewArg['element'] = $subElement;
        $viewArg['mode'] = $this->args['mode'];
        $subView = new $subViewType($viewArg);

        $this->jsFiles = array_merge($this->jsFiles, $subView->getJsFiles());
        $this->cssFiles = array_merge($this->cssFiles, $subView->getCssFiles());

        return $subView;
    }
}
