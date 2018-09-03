<?php

class GlobalModel
{
    public static function getInstance($class, $id)
    {
        $result = '';
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
            if (!isset($array[$varName])) {
                throw new Exception('Error: Missing property '.$varName);
            }
            $paramList[$varName] = $array[$varName];
        }

        return $paramList;
    }

    public static function createInstance($class, $data)
    {
        $bdd = Database::getDb();
        $requests = $class::getInsertRequests();
        $id;
        foreach ($requests as $request) {
            $req = $bdd->prepare($request);

            $usefulData = self::extractUsefullValueForInsert($request, $data);

            $req->execute($usefulData);

            if (!isset($id)) {
                $id = $bdd->lastInsertId();
                $data['id'] = $id;
            }
        }

        return $id;
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

            $req->execute($usefulData);

            if (!isset($id)) {
                $id = $bdd->lastInsertId();
                $data['id'] = $id;
            }
        }

        return $id;
    }

    public static function isUpdateAllowed($class)
    {
        if (Usermodel::isAdminConnectedUser()) {
            return $class::isAdminUptable();
        }

        return $class::isUptable();
    }
}
