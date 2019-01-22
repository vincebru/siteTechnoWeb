<?php

class AddContact extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass='ContactView';
    }
    
    public static function checkAllowed($refArray){
        $object = static::getValue($refArray, 'object');
        if($object!='' && !GlobalModel::isUpdateAllowed($object)){
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }

    public function execute() {
        $class = new ContactView($this->data);
        $addContact = new Contact($this->data);

        if(!UserModel::isConnected()) {
            $class->setMsg('You must be logged in to ask something');
            $this->currentView = $class;
            return $this->getview();
        }
        $validation = $addContact->validateForm();
        if (is_array($validation)) {
            $class->setMsg('There was an error');
            $class->setMissingProps($validation);
            $this->currentView = $class;
            return $this->getview();
        }
        $id = GlobalModel::createInstance($addContact,$addContact->getValues());
        $inserted = GlobalModel::getInstance($addContact, $id);
        $class->setInsertedContact($inserted);
        $class->setMsg('The request has been sent');
        $this->currentView = $class;
        return $this->getview();
    }
}

