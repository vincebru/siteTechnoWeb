<?php

class UpdatePassword extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="MainView";
    }
    
    public function execute() {
        
        // get formular information
        $message="";
        
        $user = UserModel::getConnectedUser();
        
        if (!isset($_POST["oldPassword"]) || $_POST["oldPassword"]=="" 
            ||User::cryptPassword($_POST["oldPassword"])!=$user->getPassword()){
            $message="Invalid old password";
            throw new TechnowebException($message,$message);
        } else if (!isset($_POST["newPassword"]) || !isset($_POST["confirmPassword"])
                || $_POST["newPassword"]!=$_POST["confirmPassword"]) {
            $message="Bad confirmation password";
            throw new TechnowebException($message,$message);
        } else {
            UserModel::updatePassword($user,$_POST["newPassword"]);
        }
        return $this->getview();
    }
}