<?php

class AddContact extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="ContactView";
    }
     
    public static function checkAllowed($refArray){
        $object = static::getValue($refArray, 'object');
        if($object!='' && !GlobalModel::isUpdateAllowed($object)){
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }

    protected function canValidateForm() {
        return UserModel::isConnected();
    }

    protected function validateForm() {
        $missingProps = array();
        foreach (Contact::propertyKeyList() as $value) {
            if($value->getOption()=="MANDATORY" && $this->data[$value->getKey()]=="") {
                array_push($missingProps, $value->getKey());
            }
        }
        return $missingProps;
    }

    public function execute() {
        $class = new ContactView($this->data);
        $addContact = new Contact($this->data);
        if(!$this->canValidateForm()) {
            $class->setMsg("You must be logged in to ask something");
            $this->currentView = $class;
            return $this->getview();

        }
        $validation = $this->validateForm();
        if (!empty($validation)) {
            $class->setMsg("There was an error");
            $class->setMissingProps($validation);
            $this->currentView = $class;
            return $this->getview();
        }
        $id = GlobalModel::createInstance($addContact,$addContact->getValues());
        $inserted = GlobalModel::getInstance($addContact, $id);
        $class->setInsertedContact($inserted);
        $class->setMsg("The request has been sent");
        $this->currentView = $class;
        return $this->getview();
    }
}

