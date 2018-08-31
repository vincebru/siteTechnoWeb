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
    var_dump($e->getStack());
    http_response_code(500);
}