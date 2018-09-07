<?php 

class Move extends AjaxAction{
    public function execute() {
        GlobalModel::moveInstance($this->data['object'],$this->data['id'],$this->data['idBefore']);
        return $this->data['id'];
    }
    
}
