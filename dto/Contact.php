<?php

class Contact extends DTO {

	static protected $tableName="contact";

	static protected $isAdminUptable=true;

	static protected $id = "contact_id";

	static protected $contact_id = "OPTIONNAL";
	static protected $user_id = "OPTIONNAL";
	static protected $element_id = "OPTIONNAL";
	static protected $title = "MANDATORY";
	static protected $content = "MANDATORY";
	static protected $created = "OPTIONNAL";
	static protected $status = "OPTIONNAL";
	static protected $visibility = "OPTIONNAL";

	function __construct($data){
		$class = new ReflectionClass('Contact');
		$staticMembers = $class->getStaticProperties();
		//une fois le refacto fait, sera factoriser dans DTO
		foreach($staticMembers as $field => &$value) {
			if($value=="OPTIONNAL" || $value == "MANDATORY") {
				static::${$field} = new PropertyKey($field,$value);
			}
			
		}
		parent::__construct($data);
	}

	static protected function propertyNameList (){
		return array(static::$contact_id,
			static::$user_id,
			static::$element_id,
			static::$title,
			static::$content,
			static::$created,
			static::$status,
			static::$visibility
		);
	}

	public function getId(){
	    return $this->get(static::$contact_id);
	}
	
	public function getUserId() {
		return $this->get(static::$user_id);
	}
	public function setUserId($user_id) {
		$this->set(static::$user_id, $user_id);
		return $this;
	}

	public function getElementId() {
		return $this->get(static::$element_id);
	}
	public function setElementId($element_id) {
		$this->set(static::$element_id, $element_id);
		return $this;
	}

	public function getTitle() {
		return $this->get(static::$title);
	}
	public function setTitle($title) {
		$this->set(static::$title, $title);
		return $this;
	}

	public function getContent() {
		return $this->get(static::$content);
	}
	public function setContent($content) {
		$this->set(static::$content, $content);
		return $this;
	}

	public function getCreated() {
		return $this->get(static::$created);
	}
	public function setCreated($created) {
		$this->set(static::$created, $created);
		return $this;
	}

	public function getStatus() {
		return $this->get(static::$status);
	}
	public function setStatus() {
		$this->set(static::$status, $status);
		return $this;
	}

	public function getVisibility() {
		return $this->get(static::$visibility);
	}
	public function setVisibility($visibility) {
		$this->set(static::$visibility, $visibility);
		return $this;
	}

}