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
}