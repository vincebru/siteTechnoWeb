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
        foreach($this->element->getSubElements() as $subElement){
            $subView = $this->getSubView($subElement);
            return  $subView->getHtml();
        }
    }

    protected function renderChildrenOutline(){
        foreach($this->element->getSubElements() as $subElement){
            $subView = $this->getSubView($subElement);
            return  $subView->getOutlineHtml();
        }
    }

    private function getSubView($subElement){
        $subViewType = $subElement->getType() . 'View';
        $viewArg = array();
        $viewArg['element'] = $subElement;
        $subView = new $subViewType($viewArg);
        return $subView;
}

    abstract protected function render();
    abstract protected function renderOutline();
}
