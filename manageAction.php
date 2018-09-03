<?php

// load action file
if (file_exists('action/'.$page.'.php')) {
    logDebug('load '.$page.' action page.');
    include 'action/'.$page.'.php';
} elseif (file_exists('action/ajax/'.$page.'.php')) {
    logDebug('load '.$page.' action page.');
    include 'action/ajax/'.$page.'.php';
} else {
    logDebug('no action for '.$page);
}
