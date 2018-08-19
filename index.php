<?php

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
<html>
	<head>
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