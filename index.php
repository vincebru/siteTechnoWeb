<?php
// start session
session_start();

//include utils function
include("utils/include.php");

// database connexion
//nothing todo, database connexion will be initialised when needed

// control on user
UserModel::init();

// get action/page requested
$menu=null;
if (isset($_GET['menu'])) {
	$menu = $_GET['menu'];
}
$page = "main";
$pagePath=$page;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$pagePath=(isset($menu)?$menu."/":"").$page;
}
logDebug("load ".$pagePath." page.");

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


$viewFile="view/".$pagePath.".php";
if (!file_exists($viewFile)){
	$pagePath="main";
	logDebug($viewFile." doesn't exist, so the main view will be loaded");
}
logDebug("load ".$pagePath." view.");

$header = new Header($page);
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4">

		<title><?php echo $page ?></title>
		<?php 
			$cssToInclude = array("common");
			$cssToInclude = array_merge($cssToInclude,$header->getCssFile());
			foreach($cssToInclude as $cssFileName){
				echo "<link href='css/".$cssFileName.".css' type='text/css' rel='stylesheet'>";
			}
		?>
	</head>
	<body>
		<?php
			// load content header file
			$header->getHtml($page);
		?>

		<section class="container-fluid">
			<?php
			// load content view file
			include("view/".$pagePath.".php");

			?>
		</section>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"></script>
		<script src="js/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"></script>
		<script src="js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"></script>
	</body>
</html>