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
        $request = 'select * from Element where element_id=:id';
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array('id' => $id));

        if ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            return self::getInstance($data[Element::$type], $id);
        } else {
            return null;
        }
    }

    private static function extractUsefullValueForInsert($request, $array)
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
                        throw new Exception('Error: Invalid group id '.$array[$varName]);
                    } else if (!isset($array[$varName])){
                        $array[$varName] = null;
                    }
                    break;
                default:
                    if (!isset($array[$varName])) {
                        throw new Exception('Error: Missing property '.$varName);
                    }
            }            
            
            $paramList[$varName] = $array[$varName];
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
            $req = $bdd->prepare($request);

            $usefulData = self::extractUsefullValueForInsert($request, $data);

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

    private static function removeNullProperties($array){
        foreach($array as $key => $value){
            if ($value==null){
                unset($array[$key]);
            }
        }
        
        return $array;
    }
    
    public static function patchInstance($class, $data)
    {
        $elementToPatch = static::getInstance($class, $data['id']);
        $elementToPatch->patch($data);

        $bdd = Database::getDb();
        $requests = $class::getInsertRequests();
        $id;
        foreach ($requests as $request) {
            $req = $bdd->prepare($request);

            $usefulData = self::extractUsefullValueForInsert($request, $data);
            
            $usefulData = static::removeNullProperties($usefulData);

            $req->execute($usefulData);

            if (!isset($id)) {
                $id = $bdd->lastInsertId();
                $data['id'] = $id;
            }
        }

        return $id;
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
            throw new Exception("Move not allowed ".$id." is not instance of ".$class);
        }
        
    }
    
    public static function getMaxRankForParentId($parentId){
        $bdd = Database::getDb();
        $request = 'select max(rank) max from Element where parent_id=:id';
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
}
