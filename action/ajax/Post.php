<?php

class Post extends AjaxAction{
    public function execute() {
        $id = GlobalModel::createInstance($this->data['object'],$this->data);
        return $id;
    }
}