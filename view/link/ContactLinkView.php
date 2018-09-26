<?php 

class ContactLinkView extends AbstractLinkView {
    
    
    public function __construct($args){
        parent::__construct('ContactView',array_merge($args,array(AbstractLinkView::PROPERTY_MENU=>'Contact')));
    }
    
    public static function getInstance(){
        return new ContactLinkView(array());
    }
}