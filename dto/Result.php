<?php

class Result extends DTO{
        
    public static $UPDATE_FIELD_VALUES="comment=:comment, value = :value";
    
    static protected $tableName = 'result';
    static public $id = 'result_id';
    static public $groupId='group_id';
    static public $userId='user_id';
    static public $evaluationId='evaluation_id';
    static public $comment='comment';
    static public $value='value';
    static protected $isAdminUptable = true;
    
    
    static protected function propertyNameList (){
        return array(static::$id,
            static::$groupId,
            static::$userId,
            static::$evaluationId,
            static::$comment,
            static::$value
        );
    }
    
    public static function getInsertRequests(){
        return array("insert into ".strtolower(static::$tableName)." (group_id, user_id, evaluation_id, comment, value) ".
            "values (:group_id, :user_id, :evaluation_id, :comment, :value)");
    }
    
    public function setId($id)
    {
        $this->set(static::$id, $id);
        
        return $this;
    }      
    
    public function getValue() {
        return $this->get(static::$value);
    }

    public function getComment() {
        return $this->get(static::$comment);
    }
}
