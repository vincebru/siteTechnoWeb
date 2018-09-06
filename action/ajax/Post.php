<?php

class Post extends AjaxAction{
    public function execute() {
        $id = GlobalModel::createInstance($object,$refArray);
    }
}