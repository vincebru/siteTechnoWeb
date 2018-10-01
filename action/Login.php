<?php

class Login extends Action{
    
    function __construct($data){
        parent::__construct($data);
        $this->viewClass="MainView";
    }
    
    
    public function execute() {
        $loginMessage="";
        if (isset($_POST["login"]) && $_POST["login"]!=""){
            $login=$_POST["login"];
        }else{
            $loginMessage.=($loginMessage!=""?"<br>":"")."Login is required";
        }
        if (isset($_POST["password"]) && $_POST["password"]!=""){
            $password=$_POST["password"];
        }else{
            $loginMessage.=($loginMessage!=""?"<br>":"")."Password is required";
        }


        if($loginMessage==""){
            $user=UserModel::getUserFromLoginClearPwd($login,$password);
            if ($user!=null){
                UserModel::logUser($user->getId());
            } else {
                $loginMessage = "Bad Login or Password";
                throw new TechnowebException($loginMessage, $loginMessage);
            }
        }else{
            throw new TechnowebException($loginMessage, $loginMessage);
        }
        return $this->getview();
    }
}

