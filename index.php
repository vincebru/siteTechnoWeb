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
<html>
	<head>
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

		<section>
			<?php
			// load content view file
			include("view/".$pagePath.".php");

			?>
		</section>
	</body>
</html>