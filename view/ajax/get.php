<?php

$result = GlobalModel::getInstance($object,$id);
echo('<pre>');
var_dump($result);
echo('coucou');

foreach (CacheElementsManager::$instanceList as $id => $element){
    echo ($id." => ".$element->getType()."<br>");
}

//$result->getHtml();