<?php

include_once 'AccessPoint.php';

class FileAcces extends AccessPoint {

    protected function display(){
        if (!isset($_GET['id'])){
            $message="Undefined image id";
            Throw new TechnowebException($message, $message);
        }
        $id=$_GET['id'];
        if(isset($_GET['type'])){
            $file=GlobalModel::getInstance($_GET['type'], $id);
            if ($file instanceof InputValue){
                $user= UserModel::getConnectedUSer();
                if (!UserModel::isAdminConnectedUser() && ($user->getId() != $file->getUserId())){
                    throw new TechnowebException('NotAllowed', 'NotAllowed');
                }
            }
        } else {
            $file=GlobalModel::getElement($id);
        }

        if (isset($file)){
            header("Content-Type:" . $file->getMime());
            echo $file->getFile();
        }
    }

}

$renderer= new FileAcces();

$renderer->render();
