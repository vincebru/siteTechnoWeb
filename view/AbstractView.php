<?php

abstract class AbstractView {

	protected $args;

	function __construct($args){
		$this->args = $args;
	}

	public function getCssFile(){
		return array("common");
	}

    public abstract function getHtml();

    public function getStatus(){
        return 'tout va bien !';
    }

}