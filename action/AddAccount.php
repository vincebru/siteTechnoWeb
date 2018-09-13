<?php

class AddAccount extends Action{
    public function execute() {
        
        // get formular information
        $message="";
        if (isset($_POST["login"]) && $_POST["login"]!=""){
            $login=$_POST["login"];
        }else{
            $message.=($message!=""?"<br>":"")."Login is required";
        }
        if (isset($_POST["password"]) && $_POST["password"]!=""){
            $password=$_POST["password"];
        }else{
            $message.=($message!=""?"<br>":"")."Password is required";
        }
        if (isset($_POST["firstname"]) && $_POST["firstname"]!=""){
            $firstname=$_POST["firstname"];
        }else{
            $message.=($message!=""?"<br>":"")."Firstname is required";
        }
        if (isset($_POST["lastname"]) && $_POST["lastname"]!=""){
            $lastname=$_POST["lastname"];
        }else{
            $message.=($message!=""?"<br>":"")."Lastname is required";
        }
        if (isset($_POST["email"]) && $_POST["email"]!=""){
            $email=$_POST["email"];
        }else{
            $message.=($message!=""?"<br>":"")."Email is required";
        }

        if($message!=""){
            Throw new TechnowebException($message,$message);
        } else {

            // check unicity on database
            if (UserModel::isLoginAlreadyUsed($login)){
                $message = "Login already used, choose another one.";
            }
            if (UserModel::isEmailUserAlreadyUsed($email)){
                $message.=($message!=""?"<br>":"")."Email already used, choose another one.";
            }
            if($message!=""){
                Throw new TechnowebException($message,$message);
            } else{
                // add user into database
                UserModel::addUser($login,$password,$firstname,$lastname,$email);

                //add user id into session

                $page="main";
            }
        }
    }
}