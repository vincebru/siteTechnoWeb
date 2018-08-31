<?php

abstract class AbstractView {

	protected $args;
    protected $jsFiles;
    protected $cssFiles;

	function __construct($args){
		$this->args = $args;
		$this->jsFiles = array();
		$this->cssFiles = array();

		$this->cssFiles['common'] = "common";
		$this->jsFiles['common'] = "script";
	}

	public function getCssFiles(){
		return $this->cssFiles;
	}

	public function getJsFiles(){
		return $this->jsFiles;
	}

    public abstract function getHtml();

    public function getStatus(){
        return 'tout va bien !';
    }

}