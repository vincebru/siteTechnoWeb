<?php

abstract class ElementView extends AbstractView
{
    const MODE_EDIT = 'Edit';
    const MODE_VIEW = 'View';

    protected $mode;
    protected $element;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->element = $args['element'];
        $this->mode = $args['mode'];
    }

    protected function getElement()
    {
        return $this->element;
    }

    protected function isEdition()
    {
        return $this->mode == ElementView::MODE_EDIT;
    }

    public function getHtml()
    {
        return $this->render();
    }

    public function getOutlineHtml()
    {
        return $this->renderOutline();
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

    abstract protected function render();

    abstract protected function renderOutline();
}
