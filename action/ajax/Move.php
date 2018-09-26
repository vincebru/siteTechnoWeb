<?php 

class Move extends WriteAction{
    public function execute() {
        GlobalModel::moveInstance($this->data['object'],$this->data['id'],$this->data['idBefore']);
        return $this->getview();
    }
    
}
