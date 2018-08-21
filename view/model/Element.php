<?php
abstract class Element {

    private $element;

    function __construct($element){
        $this->element = $element;
    }

    public function getHtml(){
        return render();
    }

    public function getOutlineHtml(){
        return renderOutline();
    }

    protected function renderChildren(){
        foreach($this->getSubElements() as $subElement){
            return  $subElement->getHtml();
        }
    }

    protected function renderChildrenOutline(){
        foreach($this->getSubElements() as $subElement){
            return  $subElement->getOutlineHtml();
        }
    }

    abstract protected function render();
    abstract protected function renderOutline();
}
