<?php

$result = GlobalModel::getInstance($object,$id);

if ($result->getType()==Element::TYPE_IMAGE){
    echo "<img src='image.php?id=".$result->getId()."'/>";
}




echo('<pre>');
var_dump($result);
echo('coucou');

foreach ($result->getSubElements() as $elementId){
    $element=CacheElementsManager::getElement($elementId);
    echo ($elementId." => ".$element->getType()."<br>");
}

//$result->getHtml();