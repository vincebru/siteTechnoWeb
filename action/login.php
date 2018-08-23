<?php


$loginMessage="";
if (isset($_POST["login"]) && $_POST["login"]!=""){
	$login=$_POST["login"];
}else{
	$loginMessage.=($loginMessage!=""?"<br>":"")."Login is required";	
}
if (isset($_POST["password"]) && $_POST["password"]!=""){
	$password=$_POST["password"];
}else{
	$loginMessage.=($loginMessage!=""?"<br>":"")."Password is required";	
}


if($loginMessage==""){
	$user=UserModel::getUserFromLoginClearPwd($login,$password);
	if ($user!=null){
		UserModel::logUser($user->getId());
		$page="main";
	} else {
		$loginMessage = "Bad Login or Password";
		$pagePath="error";
		$page=$pagePath;
	}
}else{
	$pagePath="error";
	$page=$pagePath;
}
