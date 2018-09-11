<?php

class FacilitateurAddElement extends WriteAction{
    public function execute() {
        $id=null;
        if (isset($this->data['saveElement'])){
            $toto=GlobalModel::getMaxRankForParentId($this->data['parent_id']);
            var_dump($toto);
            $this->data['rank']=GlobalModel::getMaxRankForParentId($this->data['parent_id']);
            
            $id = GlobalModel::createInstance($this->data['object'],$this->data);
        }
        return $id;
    }
}