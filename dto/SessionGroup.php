<?php

class SessionGroup extends DTO{
    
    static protected $tableName = 'session_group';
    static protected $id = 'session_group_id';
    static protected $code='code';
    static protected $name='name';
    static protected $evaluationId='evaluation_id';
    static protected $isAdminUptable = true;
    
    
    static protected function propertyNameList (){
        return array(static::$id,
            static::$code,
            static::$name,
            static::$evaluationId
        );
    }
    
    
    public function setId($id)
    {
        $this->set(static::$id, $id);
        
        return $this;
    }
    
    public function getCode()
    {
        return $this->get(static::$code);
    }
    
    public function setCode($code)
    {
        $this->set(static::$code, $code);
        return $this;
    }
    
    public function getName()
    {
        return $this->get(static::$name);
    }
    
    public function setName($name)
    {
        $this->set(static::$name, $name);
        return $this;
    }
    
    public function getEvaluationId()
    {
        return $this->get(static::$evaluationId);
    }
    
    public function setEvaluationId($evaluationId)
    {
        $this->set(static::$evaluationId, $evaluationId);
        return $this;
    }
}