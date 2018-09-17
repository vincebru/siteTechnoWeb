<?php

include_once 'AccessPoint.php';

class ImageAcces extends AccessPoint {

    public function display(){
        if (!isset($_GET['id'])){
            $message="Undefined image id";
            Throw new TechnowebException($message, $message);
        }
        $imageId=$_GET['id'];

        $image=GlobalModel::getInstance(Element::TYPE_IMAGE,$imageId);

        if (isset($image)){
            header("Content-Type:" . $image->getMime());
            echo $image->getFile();
        }
    }

}

$renderer= new ImageAcces();

$renderer->render();
