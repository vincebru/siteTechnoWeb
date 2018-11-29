<?php

class SessionGroup extends DTO{
    
    static protected $tableName = 'session_group';
    static protected $id = 'session_group_id';
    static protected $code='code';
    static protected $name='name';
    static protected $isAdminUptable = true;
    
    
    static protected function propertyNameList (){
        return array(static::$id,
            static::$code,
            static::$name
        );
    }
    
    static public function propertyKeyList() {
        return array(
            new PropertyKey(static::$id,PropertyKey::$MANDATORY),
            new PropertyKey(static::$code, PropertyKey::$MANDATORY),
            new PropertyKey(static::$name, PropertyKey::$MANDATORY), 
            new PropertyKey(static::$isAdminUptable, PropertyKey::$MANDATORY),
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
}