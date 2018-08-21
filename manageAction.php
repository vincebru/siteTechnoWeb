<?php

// load action file
$actionFile="action/".$pagePath.".php";
if (file_exists($actionFile)){
	logDebug("load ".$pagePath." action page.");
	try{
		include ($actionFile);
		$pagePath = 'ajax/get';
	} catch (Exception $e) {
		logDebug("Error (".$e->getMessage().") occured on ".$actionFile.", so the main view will be loaded");
		$pagePath = "main";
	}	
} else {
	logDebug("no action for ".$pagePath);
}