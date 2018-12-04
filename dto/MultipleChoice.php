<?php
class MultipleChoice extends DTO{

	static protected $tableName      = "multiple_choice";
	static protected $isAdminUptable = true;

	static protected $id             = 'element_id';
	static protected $name           = 'name';
	static protected $created        = 'created';
	static protected $lessonName     = 'lessonName';
	static public    $lessonId       = 'lesson_id';
	
	static protected function propertyNameList (){
		return array(static::$id,
			static::$name,
			static::$created,
			static::$lessonName,
			static::$lessonId,
		);
	}

	public function getId(){
	    return $this->get(static::$id);
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

	public function getCreated()
	{
	    return $this->get(static::$created);
	}

	public function getCreatedEnhanced()
	{
		$date = new DateTime($this->get(static::$created));
	    return $date->format('d/m/Y H:i');
	}

	public function getLessonId()
	{
	    return $this->get(static::$lessonId);
	}
	 
	public function setLessonId($lessonId)
	{
	    $this->set(static::$lessonId, $lessonId);
	    return $this;
	}

	public function getLessonName()
	{
	    return $this->get(static::$lessonName);
	}

}