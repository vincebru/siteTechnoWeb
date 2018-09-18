<?php 

class Delete extends WriteAction{
    
    public function execute(){
        GlobalModel::removeInstance($this->data['object'],$this->data['id']);
    }
}
?>