<?php 

class Move extends AjaxAction{
    public function execute() {
        GlobalModel::createInstance($object,$refArray);
    }
    
}
