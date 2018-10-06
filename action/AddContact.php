<?php

class AddContact extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="ContactView";
    }
    
    public function execute() {
        $class = new ContactView($this->data);
        $addContact = new Contact($this->data);
        $id = GlobalModel::createInstance($addContact,$addContact->getValues());
        $inserted = GlobalModel::getInstance($addContact, $id);
        $class->setInsertedContact($inserted);
        $class->setMsg("La demande a bien été envoyée");
        $this->currentView = $class;
        return $this->getview();
    }
}

