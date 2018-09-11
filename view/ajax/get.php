<?php

$result = GlobalModel::getInstance($refArray['object'],$id);

if ($result->getType()==Element::TYPE_IMAGE){
    echo "<img src='image.php?id=".$result->getId()."'/>";
}


foreach ($result->getSubElements() as $elementId){
    $element=CacheElementsManager::getElement($elementId);
    echo ($elementId." => ".$element->getType()."<br>");
}

//$result->getHtml();