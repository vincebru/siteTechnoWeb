<?php

// get action/page requested
$menu=null;
if (isset($_GET['menu'])) {
	$menu = $_GET['menu'];
}
$page = "main";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

include('manageAction.php');


$viewFile="view/".$pagePath.".php";
if (!file_exists($viewFile)){
	$pagePath="main";
	logDebug($viewFile." doesn't exist, so the main view will be loaded");
}
logDebug("load ".$pagePath." view.");

$header = new Header($page);

$cssToInclude = array("common");
$cssToInclude = array_merge($cssToInclude,$header->getCssFile());
if (isset($menu) && file_exists("css/".$menu.".css")){
	$cssToInclude = array_merge($cssToInclude,array($menu));
}

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<title><?php echo $page ?></title>
		<?php 
			
			foreach($cssToInclude as $cssFileName){
				echo "<link href='css/".$cssFileName.".css' type='text/css' rel='stylesheet'>";
			}
		?>
	</head>
	<body>
		<?php
			// load content header file
			$header->getHtml();
		?>

		<section class="container-fluid">
		<?php
			// load content view file
			include("view/".$pagePath.".php");
		?>
		</section>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- using JQuery instead of JQuery mini otherwise we can't make ajax call -->
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>