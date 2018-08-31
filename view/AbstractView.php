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

	public function getViewHtml(){
		ob_start();
		$this->getHtml();
		$viewHtml = ob_get_contents();
		ob_end_clean();
		return $viewHtml;
	}

    public abstract function getHtml();

    public function getStatus(){
        return 'tout va bien !';
    }

}