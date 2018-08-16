<?php

class Page extends Element{
	private $content;

	function __construct($data){
		self::constructFromValue($data['page_id'],$data['code'],$data['title'],$data['content']);
	}

	public function constructFromValue($id,$code, $title, $content){
		parent::__construct($id,Element::TYPE_PAGE,$code, $title, $content);
		$this->content=$content;
	}

	public function getContent()
	{
		return $this->content;
	}
	public function setContent($content)
	{
		$this->content = $content;
		return $this;
	}
}