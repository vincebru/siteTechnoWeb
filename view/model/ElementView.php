<?php
abstract class ElementView extends AbstractView {

    private $element;

    function __construct($element){
        parent::__construct($element);
        $this->element = $element['element'];
    }

    protected function getElement(){
        return $this->element;
    }

    public function getHtml(){
        return $this->render();
    }

    public function getOutlineHtml(){
        return $this->renderOutline();
    }

    protected function renderChildren(){
        logDebug('Element '.$this->element->getColType().' -  HTML: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach($this->element->getSubElements() as $subElement){
            $subView = $this->getSubView($subElement);
            $html = $html . $subView->getHtml();
        }
        return $html;
    }

    protected function renderChildrenOutline(){
        logDebug('Element '.$this->element->getColType().' - Outline: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach($this->element->getSubElements() as $subElement){
            $subView = $this->getSubView($subElement);
            $html = $html . $subView->getOutlineHtml();
        }
        return $html;
    }

    private function getSubView($subElement){
        $subViewType = $subElement->getColType() . 'View';
        $viewArg = array();
        $viewArg['element'] = $subElement;
        $subView = new $subViewType($viewArg);
        return $subView;
}

    abstract protected function render();
    abstract protected function renderOutline();
}
