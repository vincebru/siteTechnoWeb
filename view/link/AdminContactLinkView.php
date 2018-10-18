<?php 

class AdminContactLinkView extends AbstractLinkView {
    
    
    public function __construct($args){
        
        parent::__construct('AdminContactView',
            array_merge($args,
                array(AbstractLinkView::PROPERTY_MENU=>'Admin', 
                    AbstractLinkView::PROPERTY_PAGE=> 'AdminContact',
                    AbstractLinkView::PROPERTY_LABEL => 'Contact'
                )
            )
        );
    }
    
    public static function getInstance(){
        return new AdminContactLinkView(array());
    }
}