<?php

$object=$_GET['object'];
$id='';
if (isset($_GET['id'])){
	$id=$_GET['id'];
}

// get action/page requested
$menu='ajax';
$page = 'get';
if (!empty($_POST)) {
	$page = 'post';
} else if (!empty($_PATCH)){
	$page = 'patch';
} else if (!empty($_DELETE)){
	$page = 'delete';
}

include('manageAction.php');

include("view/get.php");