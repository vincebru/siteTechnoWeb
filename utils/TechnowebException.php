<?php

class TechnowebException extends Exception
{
    private $functionnalMessage;
    
    function __construct($technicalMessage,$functionnalMessage){
        parent::__construct($technicalMessage);
        $this->functionnalMessage=$functionnalMessage;
    }
    
    public function getFunctionnalMessage(){
        if($this->functionnalMessage!=null) {
            return $this->functionnalMessage;
        } 
        return "";
    }
}

