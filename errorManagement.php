<?php
ob_start();
include 'init.php';
$bdd = Database::getDb();	
$bdd->beginTransaction();
try {
	include($includeFile);
	$bdd->commit();
} catch (Exception $e) {
	ob_end_clean();
	echo '<pre>';
	$bdd->rollBack();
    echo($e->getMessage());
    var_dump($e->getTrace());
    http_response_code(500);
}