<?php

if (!isset( $_GET['object']) || !isset($_GET['id'])) {
	throw new Exception('Invalide request');
}
$requestObject = $_GET['object'];

$answer= null;

switch ($requestObject) {
    case Page:
        $answer=new Page();
        break;
    case 1:
        echo "i égal 1";
        break;
    case 2:
        echo "i égal 2";
        break;
}
var_dump($answer);