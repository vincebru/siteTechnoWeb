<?php

class Patch extends AjaxAction{
    public function execute() {
        $id = GlobalModel::patchInstance($object,$refArray);
    }
}