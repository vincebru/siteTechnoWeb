<?php

class FacilitateurAddElement extends WriteAction{
    public function execute() {
        $id=null;
        if (isset($this->data['saveElement'])){
            $this->data['rank']=GlobalModel::getMaxRankForParentId($this->data['parent_id'])+1;
            
            $id = GlobalModel::createInstance($this->data['object'],$this->data);
        }
        $this->data['id']=$id;
        return $this->getview();
    }
}