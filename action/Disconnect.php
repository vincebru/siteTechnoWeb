<?php
class Disconnect extends Action{
    
    public function execute() {
        UserModel::disconnect();
    }

}

