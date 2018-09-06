<?php
class Disconnect{
    public function execute() {
        UserModel::disconnect();
    }

}

