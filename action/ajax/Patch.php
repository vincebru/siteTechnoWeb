<?php

class Patch extends WriteAction{
    public function execute() {
        $id = GlobalModel::patchInstance($this->data['object'],$this->data);
        $this->data['id']=$id;
        return $this->getview();
    }
}