<?php

class Link{

	private $menuLabel;
	private $menuLink;
	private $page;

	function __construct($menuLabel,$menuLink,$page){
		$this->menuLabel=$menuLabel;
		$this->menuLink=$menuLink;
		$this->page=$page;
	}

	public function getMenuLabel()
	{
	    return $this->menuLabel;
	}
	 
	public function setMenuLabel($menuLabel)
	{
	    $this->menuLabel = $menuLabel;
	    return $this;
	}

	public function getLink()
	{
	    return $this->menuLink;
	}
	 
	public function setLink($menuLink)
	{
	    $this->menuLink = $menuLink;
	    return $this;
	}
	public function getPage()
	{
	    return $this->page;
	}
	 
	public function setPage($page)
	{
	    $this->page = $page;
	    return $this;
	}
}