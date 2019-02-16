<?php 

class AdminFormValuesLinkView extends AbstractLinkView {
    
    
    public function __construct($args){
        
        parent::__construct('AdminFormValuesView',
            array_merge($args,
                array(AbstractLinkView::PROPERTY_MENU=>'Admin', 
                    AbstractLinkView::PROPERTY_PAGE=> 'AdminFormValues',
                    AbstractLinkView::PROPERTY_LABEL => 'Form values'
                )
            )
        );
    }
    
    public static function getInstance(){
        return new AdminFormValuesLinkView(array());
    }
}