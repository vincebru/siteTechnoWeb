<?php

include_once 'AccessPoint.php';

class FileAcces extends AccessPoint {

    protected function display(){
        if (!isset($_GET['id'])){
            $message="Undefined image id";
            Throw new TechnowebException($message, $message);
        }
        $imageId=$_GET['id'];

        $image=GlobalModel::getElement($imageId);

        if (isset($image)){
            header("Content-Type:" . $image->getMime());
            echo $image->getFile();
        }
    }

}

$renderer= new FileAcces();

$renderer->render();
