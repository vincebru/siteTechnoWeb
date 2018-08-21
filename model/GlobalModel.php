<?php
class GlobalModel{

	public static function getInstance($class,$id){
		$result='';
		$bdd = Database::getDb();	
		$request = $class::getRequestById();
		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('id'=>$id));
		
		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			$result = new $class($data);
			if ($result instanceof Element){
				//getSubElement
				$request = $class::getRequestSubElementById();
				$preparedRequest = $bdd->prepare($request);
				$preparedRequest->execute(array('id'=>$id));
				while($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
					$subElement = new $data['type']($data);
					$result->addSubElement($subElement);
				}
			}
		}
		return $result;
	}

	private static function extractUsefullValueForInsert($request,$array){
		$list=split(':',$request);
		$paramList=array();
		for ($i=1; $i < count($list); $i++) { 
			//skip first element because it's insert command
			$list2=split(",",$list[$i]);
			$list3=split(")",$list2[0]);
			$paramList[$list3[0]]=$array[$list3[0]];
		}
		return $paramList;
	}

	public static function createInstance($class,$data){
		$bdd = Database::getDb();
		$requests = $class::getInsertRequests();
		$id;
		foreach ($requests as $request) {	
			$req = $bdd->prepare($request);

			$usefulData = self::extractUsefullValueForInsert($request,$data);

		 	$req->execute($usefulData);

			if (!isset($id)){
				$id=$bdd->lastInsertId();
				$data['id']=$id;
			}
		}
		return $id;
	}

	public static function isUpdateAllowed($class){
		if (Usermodel::isAdminConnectedUser()){
			return $class::isAdminUptable();
		}
		return $class::isUptable();
	}
}