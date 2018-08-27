<?php

// load action file
$actionFile="action/".$pagePath.".php";
if (file_exists($actionFile)){
	logDebug("load ".$pagePath." action page.");
	include ($actionFile);
} else {
	logDebug("no action for ".$pagePath);
}