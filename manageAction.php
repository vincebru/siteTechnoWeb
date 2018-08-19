<?php
// start session
session_start();

//include utils function
include("utils/include.php");

// database connexion
//nothing todo, database connexion will be initialised when needed

$pagePath=(isset($menu)?$menu."/":"").$page;
logDebug("load ".$pagePath." page.");

// control on user
UserModel::init();

//control page access
if (!RoleModel::isAllowed($menu, $page)) {
	$pagePath='notAllowed';
}

// load action file
$actionFile="action/".$pagePath.".php";
if (file_exists($actionFile)){
	logDebug("load ".$pagePath." action page.");
	try{
		include ($actionFile);
	} catch (Exception $e) {
		logDebug("Error (".$e->getMessage().") occured on ".$actionFile.", so the main view will be loaded");
		$pagePath = "main";
	}
	
} else {
	logDebug("no action for ".$pagePath);
}