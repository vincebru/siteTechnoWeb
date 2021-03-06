<?php

class Answer extends DTO
{
    
    static protected $tableName="answer";
    static protected $isAdminUptable=true;
    static protected $isUptable=true;
    
    static protected $id='answer_id';
    static protected $value='content';
    static protected $userId='user_id';
    static protected $groupId='group_id';
    static protected $creationDate='creation_date';
    static protected $complementaryData='complementary_data'; 
    
    static protected function propertyNameList (){
        return array(static::$id,
            static::$value,
            static::$userId,
            static::$groupId,
            static::$creationDate,
            static::$complementaryData);
    }
    
    function __construct($data){
        parent::__construct($data);
    }
    
    
}

