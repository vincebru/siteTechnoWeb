<?php

$result = GlobalModel::getInstance($object,$id);
echo('<pre>');
var_dump($result);
echo('coucou');

foreach ($result->getSubElements() as $elementId){
    $element=CacheElementsManager::getElement($elementId);
    echo ($elementId." => ".$element->getType()."<br>");
}

//$result->getHtml();