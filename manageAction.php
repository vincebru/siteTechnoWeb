<?php

// load action file
if (file_exists($actionFile)) {
    logDebug('load '.$page.' action page.');
    include $actionFile;
} else {
    logDebug('no action for '.$page);
}
