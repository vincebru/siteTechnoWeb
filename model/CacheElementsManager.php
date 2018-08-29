<?php

class CacheElementsManager{
    
    
    public static $instanceList=array();
    
    public static function cacheElement($element){
        $bdd = Database::getDb();
        $id=$element->getId();
        $class=$element->getType();
        if (!isset(self::$instanceList[$id])){
            self::$instanceList[$id]=$element;
            //getSubElement
            $request = $class::getRequestSubElementById();
            $preparedRequest = $bdd->prepare($request);
            $preparedRequest->execute(array('id'=>$id));
            while($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
                $subElement = new $data['type']($data);
                if ($subElement->hasComplementTableName()){
                    $query = $subElement->getRequestById();
                    $preparedQuery = $bdd->prepare($query);
                    $preparedQuery->execute(array('id'=>$data['element_id']));
                    while($fullData = $preparedQuery->fetch(PDO::FETCH_ASSOC)){
                        $subElement = new $fullData['type']($fullData);
                    }
                }
                $element->addSubElement($subElement);
                self::cacheElement($subElement);
            }
        }
        
        return self::$instanceList[$id];
    }
    
    public static function getElement($id){
        if (isset(self::$instanceList[$id])){
            return self::$instanceList[$id];
        } else {
            $element = GlobalModel::getElement($id);
            self::$instanceList[$id] = $element;
            return $element;
        }
    }
    
}