<?php

class GlobalModel
{
    public static function getInstance($class, $id)
    {
        $result = null;
        $bdd = Database::getDb();
        $request = $class::getRequestById();
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('id' => $id));

        if ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            $result = new $class($data);
            if ($result instanceof Element) {
                $result = CacheElementsManager::cacheElement($result);
            }
        }

        return $result;
    }

    public static function getElement($id)
    {
        $bdd = Database::getDb();
        $request = 'select * from element where element_id=:id';
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('id' => $id));

        if ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            return self::getInstance($data[Element::$type], $id);
        } else {
            return null;
        }
    }

    private static function extractUsefullValueForInsert($request, $array, $class)
    {
        // $request format:
        // insert.....(...)values (:var1 ,:var2 )....
        $split1 = explode(':', $request);
        // $split1 [0]: insert.....(...)values (
        // $split1 [1]: var1 ,
        // $split1 [2]: var2 )....
        $paramList = array();
        for ($i = 1; $i < count($split1); ++$i) {
            //skip first element because it's insert command (insert.....(...)values ()
            $split2 = explode(',', $split1[$i]);
            //$split2[0]: var1  or var2 )....
            $split3 = explode(')', $split2[0]);
            //$split3[0]: var1  or var2
            $varName = trim($split3[0]);

            $remove = False;
            switch ($varName) {
                case 'creation_data':
                    $array[$varName]=getdate();
                    break;
                case 'user_id':
                    $array[$varName]=UserModel::getConnectedUser()->getId();
                    break;
                case 'complementary_data':
                    $array[$varName]=serialize($array);
                    break;
                case 'group_id':
                    if (isset($array[$varName]) && !UserModel::isGroupOfConnectedUser($array[$varName])){
                        $message = 'Error: Invalid group id '.$array[$varName] ;
                        throw new TechnowebException($message, $message);
                    } else if (!isset($array[$varName])){
                        $array[$varName] = null;
                    }
                    break;
                default:
                    $optionnal = False;
                    foreach ($class::propertyKeyList() as $key => $value) {
                        if($value->getKey()==$varName && $value->getOption()==PropertyKey::$OPTIONNAL) {
                            $optionnal = True;
                        }
                    }
                    if (!isset($array[$varName])) {
                        if($optionnal) {
                            $remove = True;
                        } else {
                            $message='Error: Missing property '.$varName;
                            throw new TechnowebException($message, $message);
                        }
                    }
            }            

            if(!$remove) $paramList[$varName] = $array[$varName];
        }

        return $paramList;
    }

    public static function createInstance($class, $data)
    {
        $bdd = Database::getDb();
        $requests = $class::getInsertRequests();
        $specificDatabaseType=$class::getSpecificDatabaseType();
        $id;

        foreach ($requests as $request) {
            $params = explode("(", $request)[1];
            $values = explode("(", $request)[2];
            $params = explode(")",$params)[0];
            $values = explode(")", $values)[0];
            $presentParams = array();
            $presentValues = array();

            $usefulData = self::extractUsefullValueForInsert($request, $data, $class);

            foreach (explode(",",$params) as $value) {
                if(array_key_exists($value, $usefulData)) {
                    array_push($presentParams, $value);
                }
            }
            foreach (explode(",",$values) as $value) {
                if(array_key_exists(explode(':',$value)[1], $usefulData)) {
                    array_push($presentValues, $value);
                }
            }
            $presentParams = "(".join(",",$presentParams).")";
            $presentValues = "(".join(",",$presentValues).")";
            $request = str_replace("(".$params.")", $presentParams, $request);
            $request = str_replace("(".$values.")", $presentValues, $request);
            $req = $bdd->prepare($request);


            foreach($usefulData as $key => $value) {
                if (isset($specificDatabaseType[$key])) {
                    $req->bindValue(':'.$key, $value, $specificDatabaseType[$key]);
                } else {
                    $req->bindValue(':'.$key, $value);
                }
            }
            $req->execute();

            if (!isset($id)) {
                $id = $bdd->lastInsertId();
                $data['id'] = $id;
            }
        }

        return $id;
    }

    public static function removeInstance($class, $id)
    {
        if ($class instanceof Element) {
            $elementToRemove = static::getInstance($class, $id);
            foreach ($elementToRemove.getSubElements() as $subElementId) {
                $subElement = static::getElement($subElementId);
                static::removeInstance($subElement.getType(), $id);
            }
        }
        
        $bdd = Database::getDb();
        $requests = $class::getRemoveRequests();

        foreach ($requests as $request) {
            $req = $bdd->prepare($request);
            $req->bindValue(':id', $id);
            $req->execute();
        }
    }

    private static function removeNullProperties($array){
        foreach($array as $key => $value){
            if ($value==null){
                unset($array[$key]);
            }
        }
        
        return $array;
    }
    
    private static function extractUsefullValueForUpdate($request, $array)
    {
        // $update format:
        $field = array($request);
        if (strpos($request, ',') >= 0){
        // content = :content, rank = :rank
            $field = explode(',', $request);
        }
        // $field [0]: content = :content
        // $field [1]: rank = :rank
        $paramList = array();
        for ($i = 0; $i < count($field); ++$i) {
            $value = explode(':', $field[$i]);
            //$value[0]: content = or rank =
            //$value[1]: content or rank
            $varName = trim($value[1]);
            
            $paramList[$varName] = $array[$varName];
        }

        $paramList['id'] = $array['id'];

        return $paramList;
    }

    public static function patchInstance($class, $data)
    {
        $elementToPatch = static::getInstance($class, $data['id']);
        $elementToPatch->patch($data);

        $bdd = Database::getDb();
        $request = $class::getPatchRequest();

        $request = str_replace($class::$UPDATE_FIELD_KEY, $class::$UPDATE_FIELD_VALUES, $request);
        $req = $bdd->prepare($request);

        $usefulData = self::extractUsefullValueForUpdate($class::$UPDATE_FIELD_VALUES, $data);

        $req->execute($usefulData);
    }
    
    private static function isInstanceOf($class, $id){
        $element = static::getInstance($class, $id);
        return $element != null;
    }
    
    public static function moveInstance($class,$id,$beforeId) {
        // check $id is instance of $class
        if(static::isInstanceOf($class, $id)){
            
            $bdd = Database::getDb();
            
            // get parent id (from cacheElement, load is done on instanceOf test)
            $beforeElement = static::getElement($beforeId);
            $newRank=$beforeElement->getPosition();
            
            // create update request for all element after $beforeId
            $req = "update element set rank=rank+1 where parent_id=:parentId and rank >= :beforeRank";
            $prepStatement=$bdd->prepare($req);
            
            $param = array('parentId' => $beforeElement->getParentId(),
                'beforeRank'=>$beforeElement->getPosition());
                        
            $prepStatement->execute($param);
            
            // create update request  for $id
            $element = CacheElementsManager::getElement($id);
            
            $req = "update element set rank=:newPosition, parent_id=:newParentId where element_id=:id";
            $prepStatement=$bdd->prepare($req);
            
            $param = array('newPosition' => $beforeElement->getPosition(),
                'newParentId'=>$beforeElement->getParentId(),
                'id'=>$element->getId()
            );
            
            $prepStatement->execute($param);
            
        } else {
            $message="Move not allowed ".$id." is not instance of ".$class;
            throw new TechnowebException($message, $message);
        }
        
    }
    
    public static function getMaxRankForParentId($parentId){
        $bdd = Database::getDb();
        $request = 'select max(rank) as max from element where parent_id=:id';
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('id' => $parentId));
        
        if ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            if ($data['max']!=null){
                return $data['max'];
            }
        } 
        return 0;
    }

    public static function isUpdateAllowed($class)
    {
        if (Usermodel::isAdminConnectedUser()) {
            return $class::isAdminUptable();
        }
        return $class::isUptable();
    }
    
    
    public static function getElementParent($element){
        return CacheElementsManager::getElement($element->getParentId());
    }
    
}
