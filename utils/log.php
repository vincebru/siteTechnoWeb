<?php

function isHtmlDebug(){
	return false;
}

function isConsoleDebug(){
	return true;
}

if (isHtmlDebug()) {
	echo ('<pre>');
}

function logDebug($message){
	if (isHtmlDebug()) {
		echo($message."<br>");
	}

	if (isConsoleDebug()) {
		debugToConsole($message);
	}

}

function logDebugAndDie($message) {
	logDebug($message);
	die;
}

function vardumpDebug($data) {
	if (isHtmlDebug()) {
		var_dump($data);
	}

	if (isConsoleDebug()) {
		debugToConsole($message);
	}
}

function boolValue($bool){
	return  ($bool) ? 'true' : 'false';
}

function debugToConsole( $data ) {
    $output = $data;
    if ( is_array( $output ) ){
        $output = implode( ',', $output);
	}
	
	$output = str_replace("'", "\'", $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}



