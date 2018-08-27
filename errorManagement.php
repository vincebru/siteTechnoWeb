<?php
ob_start();
include_once("utils/Database.php");
$bdd = Database::getDb();	
$bdd->beginTransaction();
try {
	include($includeFile);
	$bdd->commit();
} catch (Exception $e) {
	ob_end_clean();
	$bdd->rollBack();
    echo($e->getMessage());
    http_response_code(500);
}