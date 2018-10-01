<?php

class Post extends WriteAction{
    public function execute() {
        $id = GlobalModel::createInstance($this->data['object'],$this->data);
        $this->data['id']=$id;
        return $this->getview();
    }
}