<?php

class Result extends DTO{
        
    public static $UPDATE_FIELD_VALUES="value = :value";
    
    static protected $tableName = 'result';
    static public $id = 'result_id';
    static public $groupId='group_id';
    static public $userId='user_id';
    static public $evaluationId='evaluation_id';
    static public $value='value';
    static protected $isAdminUptable = true;
    
    
    static protected function propertyNameList (){
        return array(static::$id,
            static::$groupId,
            static::$userId,
            static::$evaluationId,
            static::$value
        );
    }
    
    public static function getInsertRequests(){
        return array("insert into ".static::$tableName." (group_id, user_id, evaluation_id, value) ".
            "values (:group_id, :user_id, :evaluation_id, :value)");
    }
    
    public function setId($id)
    {
        $this->set(static::$id, $id);
        
        return $this;
    }      
    
    public function getValue() {
        return $this->get(static::$value);
    }
}