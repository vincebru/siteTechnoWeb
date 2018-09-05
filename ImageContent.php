<?php

class ImageContent{
    public function render(){
        if (!isset($_GET['id'])){
            Throw new Exception("Undefined image id");
        }
        $imageId=$_GET['id'];
        
        $image=GlobalModel::getInstance(Element::TYPE_IMAGE,$imageId);
        
        header("Content-Type:" . $image->getMime());
        echo $image->getFile();
    }
}
    
    
?>