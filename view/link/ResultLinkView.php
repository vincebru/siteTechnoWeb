<?php 

class ResultLinkView extends AbstractLinkView {
    
    
    public function __construct($args){
        parent::__construct('EvaluateUserView',array_merge($args,array(AbstractLinkView::PROPERTY_MENU=>'Result')));
    }
    
    public static function getInstance(){
        return new ResultLinkView(array());
    }
}