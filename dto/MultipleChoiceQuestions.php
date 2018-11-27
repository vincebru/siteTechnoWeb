<?php
class MultipleChoiceQuestions extends DTO{

	static protected $tableName      = "multiple_choice_questions";
	static protected $isAdminUptable = true;

	static protected $id                 = 'element_id';
	static protected $question           = 'question';
	static protected $answers            = 'answers';
	static public    $multiple_choice_id = 'multiple_choice_id';
	
	static protected function propertyNameList (){
		return array(static::$id,
			static::$question,
			static::$answers,
			static::$multiple_choice_id,
		);
	}

	public function getId(){
	    return $this->get(static::$id);
	}
	
	public function getQuestion()
	{
	    return $this->get(static::$question);
	}
	 
	public function setQuestion($question)
	{
	    $this->set(static::$question, $question);
	    return $this;
	}
	
	public function getAnswers()
	{
	    return $this->get(static::$answers);
	}
	 
	public function setAnswers($answers)
	{
	    $this->set(static::$answers, $answers);
	    return $this;
	}
	
	public function getMultipleChoiceId()
	{
	    return $this->get(static::$multiple_choice_id);
	}
	 
	public function setMultipleChoiceId($multiple_choice_id)
	{
	    $this->set(static::$multiple_choice_id, $multiple_choice_id);
	    return $this;
	}

}