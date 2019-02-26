<?php

class FacilitateurAddElement extends WriteAction{
    public function execute() {
        $id=null;
        if (isset($this->data['saveElement'])){
            if ($this->data['object'] == Element::TYPE_FILE || $this->data['object'] == Element::TYPE_IMAGE){
                $this->data=array_merge($this->data,$this->data['file']);
            }
            if (isset($this->data['elementId']) && $this->data['elementId']!="") {
                $this->data["id"] = $this->data['elementId'];
                GlobalModel::patchInstance($this->data['object'],$this->data);
                $id = $this->data['elementId'];
            } else {
                $this->data['rank']=GlobalModel::getMaxRankForParentId($this->data['parent_id'])+1;
                
                $id = GlobalModel::createInstance($this->data['object'],$this->data);
            }
        }
        $this->data['id']=$id;
        return $this->getview();
    }
}