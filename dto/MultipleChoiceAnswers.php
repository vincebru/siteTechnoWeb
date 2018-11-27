<?php
class MultipleChoiceAnswers extends DTO{

	static protected $tableName          = "multiple_choice_answers";
	static protected $isAdminUptable     = true;

	static protected $id                 = 'element_id';
	static protected $answer             = 'answer';
	static protected $result             = 'result';
	static public    $multiple_choice_questions_id = 'multiple_choice_questions_id';
	static public    $stats              = 'stats';
	
	static protected function propertyNameList (){
		return array(static::$id,
			static::$answer,
			static::$result,
			static::$multiple_choice_questions_id,
			static::$stats,
		);
	}

	public function getId(){
	    return $this->get(static::$id);
	}
	
	public function getAnswer()
	{
	    return $this->get(static::$answer);
	}
	 
	public function setAnswer($answer)
	{
	    $this->set(static::$answer, $answer);
	    return $this;
	}
	
	public function getResult()
	{
	    return $this->get(static::$result);
	}
	 
	public function setResult($result)
	{
	    $this->set(static::$result, $result);
	    return $this;
	}
	
	public function getMultipleChoiceQuestionId()
	{
	    return $this->get(static::$multiple_choice_questions_id);
	}
	 
	public function setMultipleChoiceQuestionId($multiple_choice_questions_id)
	{
	    $this->set(static::$multiple_choice_questions_id, $multiple_choice_questions_id);
	    return $this;
	}

	public function getStats()
	{
	    return $this->get(static::$stats);
	}
	 
	public function setStats($stats)
	{
	    $this->set(static::$stats, $stats);
	    return $this;
	}

}