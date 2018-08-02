<?php

class Rights{

	private $menuRights;
	private $menuPagesRights;
	private $pageRights;

	function __construct(){
		$this->menuRights=array();
		$this->menuPagesRights=array();
		$this->pageRights=array();
	}


	public function addRights($menu,$page,$rights){
		if (isset($page)) {
			$pageKey=$page;
			if (isset($menu)){
				$pageKey=$menu."/".$page;
				$this->menuPagesRights[$menu]=self::addRightsToArray($this->menuPagesRights,$menu,$rights);
			}
			$this->pageRights[$pageKey] = self::addRightsToArray($this->pageRights,$pageKey,$rights);
		} else {
			$this->menuRights[$menu]=self::addRightsToArray($this->menuRights,$menu,$rights);
		}

	}

	private function addRightsToArray($array,$key,$rights){
		if (isset($array[$key])) {
			return array_merge($array[$key],$rights);
		}else{
			return $rights;
		}	
	}

	public function isAllowed($role,$menu,$page){
		if (isset($page)){
			//check into $this->pageRights
			if (!isset($this->pageRights[$page])){
				return true;
			}
			return in_array($role, $this->pageRights[$page]);
		} if (isset($this->menuRights[$menu])) {
			//check rights link to menu
			return in_array($role, $this->menuRights[$menu]);
		} 

		if (!isset($this->menuPagesRights[$menu])){
			return true;
		}
		//check rights link to at leasu one page inside menu
		return in_array($role, $this->menuPagesRights[$menu]);
	}

}