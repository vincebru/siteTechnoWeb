<?php 

class AdminUserLinkView extends AbstractLinkView {
    
    
    public function __construct($args){
        
        parent::__construct('AdminUserView',
            array_merge($args,
                array(AbstractLinkView::PROPERTY_MENU=>'Admin', 
                    AbstractLinkView::PROPERTY_PAGE=> 'AdminUser',
                    AbstractLinkView::PROPERTY_LABEL => 'User'
                )
            )
        );
    }
    
    public static function getInstance(){
        return new AdminUserLinkView(array());
    }
}