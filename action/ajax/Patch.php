<?php

class Patch extends WriteAction{
    public function execute() {
        $id = GlobalModel::patchInstance($this->data['object'],$this->data);
        return $id;
    }
}