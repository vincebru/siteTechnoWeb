<?php

class Contact extends DTO {

	static protected $tableName="contact";

	static protected $isAdminUptable=true;

	static protected $id = "contact_id";
	static protected $parent_id = "parent_id";
	static protected $user_id = "user_id";
	static protected $element_id = "element_id";
	static protected $title = "title";
	static protected $content = "content";
	static protected $created = "created";
	static protected $status = "status";
	static protected $visibility = "visibility";

	function __construct($data){
		parent::__construct($data);
	}

	static protected function propertyNameList (){
		return array(static::$id,
			static::$parent_id,
			static::$user_id,
			static::$element_id,
			static::$title,
			static::$content,
			static::$created,
			static::$status,
			static::$visibility
		);
	}


	static public function propertyKeyList() {
		return array(
			new PropertyKey(static::$id,PropertyKey::$OPTIONNAL),
			new PropertyKey(static::$parent_id, PropertyKey::$OPTIONNAL),
			new PropertyKey(static::$user_id, PropertyKey::$OPTIONNAL), 
			new PropertyKey(static::$element_id, PropertyKey::$OPTIONNAL), 
			new PropertyKey(static::$title, PropertyKey::$MANDATORY), 
			new PropertyKey(static::$content, PropertyKey::$MANDATORY), 
			new PropertyKey(static::$created, PropertyKey::$OPTIONNAL), 
			new PropertyKey(static::$status, PropertyKey::$OPTIONNAL), 
			new PropertyKey(static::$visibility, PropertyKey::$OPTIONNAL)
		);
	}

	public function getId(){
	    return $this->get(static::$id);
	}
	

	public function getParentId() {
		return $this->get(static::$parent_id);
	}

	public function setParentId($parent_id) {
		$this->set(static::$parent_id, $parent_id);
		return $this;
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