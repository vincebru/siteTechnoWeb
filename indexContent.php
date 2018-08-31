<?php
	// get action/page requested
	$menu=null;
	if (isset($_GET['menu'])) {
		$menu = $_GET['menu'];
	} else if (isset($_POST['menu'])) {
		$menu = $_POST['menu'];
	}

	$page = "Main";
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else if (isset($_POST['page'])) {
		$page = $_POST['page'];
	}

	include('init.php');
	$args = array();

	//control page access
	if (!RoleModel::isAllowed($menu, $page)) {
		$pagePath='NotAllowedView';
	}

	try{
		include('manageAction.php');
	} catch (Exception $e) {
		logDebug("Error (".$e->getMessage().") occured on ".$actionFile.", so the main view will be loaded");
		logDebug("File: ".$e->getFile().", line: ".$e->getLine().", code: ".$e->getCode().", occured on ".$actionFile);
		var_dump($e->getTrace());
		$pagePath = "MainView";
	}	

	$viewFile="view/".$pagePath.".php";
	if (!file_exists($viewFile)){
		if (Element::isRootElements($menu)){
			try{
				logDebug("Query for a root element: " . $menu);
				$args['element'] = GlobalModel::getInstance($menu, $page);
				$pagePath = $menu . 'View';
			} catch (Exception $e) {
				logDebug("Error (".$e->getMessage().") occured on ".$actionFile.", so the main view will be loaded");
				logDebug("File: ".$e->getFile().", line: ".$e->getLine().", code: ".$e->getCode().", occured on ".$actionFile);
				$args["errorMessage"] = $e->getMessage();
				$args["stack"] = $e->getTrace();
				$pagePath = "ErrorView";
			}
		} else {
			$pagePath="MainView";
			logDebug($viewFile." doesn't exist, so the main view will be loaded");
		}
	}
	logDebug("load ".$pagePath." view for page ".$page.".");

	$args['page'] = $page;
	$header = new Header($args);
	$view = new $pagePath($args);
	logDebug('$view status: '.$view->getStatus() . '.');

	$cssToInclude = array_merge($view->getCssFiles(), $header->getCssFiles());
	$jsToInclude = array_merge($view->getJsFiles(), $header->getJsFiles());

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
				foreach($cssToInclude as $key => $cssFileName){
					echo "<link href='css/".$cssFileName.".css' type='text/css' rel='stylesheet'>";
				}
			?>
		</head>
		<body>
			<?php
				// load content header file
				$header->getHtml();
			?>

			<section class="main container-fluid">
			<?php
				// load content view file
				try{
					$view->getHtml();
				} catch (Exception $e) {
					logDebug("Error (".$e->getMessage().") occured on ".$actionFile.", so the main view will be loaded");
					logDebug("File: ".$e->getFile().", line: ".$e->getLine().", code: ".$e->getCode().", occured on ".$actionFile);
					$args["errorMessage"] = $e->getMessage();
					$args["stack"] = $e->getTrace();
					$pagePath = "ErrorView";
					$view = new $pagePath($args);
					$view->getHtml();
				}
			?>
			</section>
			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<!-- using JQuery instead of JQuery mini otherwise we can't make ajax call -->
			<script src="js/jquery-3.3.1.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<?php 
				foreach($jsToInclude as $key => $jsFileName){
					echo "<script src='js/".$jsFileName.".js'></script>";
				}
			?>
		</body>
	</html>