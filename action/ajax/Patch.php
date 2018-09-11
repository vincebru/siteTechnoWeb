<?php

class Patch extends AjaxAction{
    public function execute() {
        $id = GlobalModel::patchInstance($this->data['object'],$this->data);
        return $id;
    }
}