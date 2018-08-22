<?php
	function getValue($array, $key){
		if (isset($array[$key])){
			return $array[$key];
		}
		return "";
	}

	// get action/page requested
	$menu='ajax';
	$page = 'get';
	$pagePath="ajax/get";
	$refArray=$_GET;
	$isWriteAction=false;
	if (!empty($_POST)) {
		$page = 'post';
		$refArray=$_POST;
		$isWriteAction=true;
	} else if (!empty($_PATCH)){
		$page = 'patch';
		$refArray=$_PATCH;
		$isWriteAction=true;
	} else if (!empty($_DELETE)){
		$page = 'delete';
		$refArray=$_DELETE;
		$isWriteAction=true;
	} 
	$object=getValue($refArray,'object');
	$id=getValue($refArray,'id');

	include('init.php');

	if ($isWriteAction){
		if (GlobalModel::isUpdateAllowed($object)){
			include('manageAction.php');
			$pagePath = 'ajax/get';
		} else {
			$pagePath = 'ajax/notAllowed';
		}
	}

	$viewFile="view/".$pagePath.".php";
	if (!file_exists($viewFile)){
		$pagePath="ajax/main";
		logDebug($viewFile." doesn't exist, so the main view will be loaded");
	}
	include("view/".$pagePath.".php");