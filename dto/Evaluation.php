<?php

class Evaluation extends DTO{
    
    
    const TYPE_GROUP='Group';
    const TYPE_USER='User';
    
    static protected $tableName = 'evaluation';
    static protected $id = 'evaluation_id';
    static protected $name='name';
    static protected $type='type';
    static protected $minValue='min_value';
    static protected $maxValue='max_value';
    static public $parentId='parent_id';
    static protected $coef='coef';
    static protected $isAdminUptable = true;
    
    
    static protected function propertyNameList (){
        return array(static::$id,
            static::$name,
            static::$type,
            static::$minValue,
            static::$maxValue,
            static::$coef,
            static::$parentId
        );
    }
    
    public static function getInsertRequests(){
        return array("insert into ".static::$tableName." (session_group_id, name, type, min_value, max_value, coef,id_parent) ".
            "values (:session_group_id, :name, :type, :min_value, :max_value, :coef, :id_parent)");
    }
    
    public function setId($id)
    {
        $this->set(static::$id, $id);
        
        return $this;
    }  
    
    public function getType(){
        return $this->get(static::$type);
    }
    
    public function getName(){
        return $this->get(static::$name);
    }
    
    public function getMinValue(){
        return $this->get(static::$minValue);
    }
    
    public function getMaxValue(){
        return $this->get(static::$maxValue);
    }
    
    public function getCoef(){
        return $this->get(static::$coef);
    }
    
    public function isGroupEvaluation(){
        return $this->getType()==self::TYPE_GROUP;
    }
    public function isUserEvaluation(){
        return $this->getType()==self::TYPE_USER;
    }
    
    public function setIdParent($parentId)
    {
        $this->set(static::$parentId, $id);
        
        return $this;
    }
    
    public function getIdParent(){
        return $this->get(static::$parentId);
    }
}