<?php

class WorkGroup extends DTO{
    
    
    static protected $tableName = 'work_group';
    static protected $id = 'work_group_id';
    static protected $repository='repository';
    static protected $name='name';
    static protected $isAdminUptable = true;
    
    
    static protected function propertyNameList (){
        return array(static::$id,
            static::$repository,
            static::$name
        );
    }
    
    public static function getInsertRequests(){
        return array("insert into ".static::$tableName." (repository, name) ".
            "values (:repository, :name)");
    }
    
    public function setId($id)
    {
        $this->set(static::$id, $id);
        
        return $this;
    }
    
    public function getRepository()
    {
        return $this->get(static::$repository);
    }
    
    public function setRepository($repository)
    {
        $this->set(static::$repository, $repository);
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