<?php 

class EvaluateUser  extends WriteAction{
    
    private $user;
    private $results;
    private $evaluations;
    
    function __construct($data){
        parent::__construct($data);
        $this->user=GlobalModel::getInstance('User',$data['userId']);
        $this->results=ResultModel::getResults($this->user);
        $this->evaluations=GlobalModel::getAllFromIds('Evaluation',array_keys($this->getResultToSave()));
    }
    
    public static function checkAllowed($refArray){
        if(!UserModel::isAdminConnectedUser()) {            
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }
    
    private function isGroupEvaluation($evaluationId) {
        if (isset($this->evaluations[$evaluationId])){
            $evaluation=$this->evaluations[$evaluationId];
            return $evaluation->isGroupEvaluation();
        }
        return false;
    }
    
    public function execute() {
        if (isset($this->data['save'])) {
            foreach ($this->getResultToSave() as $evaluationId => $value){
                $resultParam=array(
                    Result::$evaluationId => $evaluationId,
                    Result::$value => $value                    
                );
                if ($this->isGroupEvaluation($evaluationId)) {
                    $resultParam[Result::$groupId]=$this->user->getWorkGroupId();
                    $resultParam[Result::$userId]=null;
                } else {
                    $resultParam[Result::$userId]=$this->user->getId();
                    $resultParam[Result::$groupId]=null;
                }
                if(!isset($this->results[$evaluationId])){
                    //insert value
                    GlobalModel::createInstance('Result',$resultParam);
                } else if($this->results[$evaluationId]!=$value){
                    //update value
                    $resultParam['id']=$this->results[$evaluationId]->getId();
                    GlobalModel::patchInstance('Result',$resultParam);
                }
            }
        }
        return $this->getview();
    }
    
    private function getResultToSave(){
        $resultsIdToSave= array();
        foreach ($this->data as $key=>$value){
            if ($this->isAResultKey($key) && $value!=''){
                $resultId=str_replace("result_","",$key);
                $resultsIdToSave[$resultId]=$value;
            }
        }
        return $resultsIdToSave;
    }
    
    private function isAResultKey($key){
        return strpos($key, 'result_') === 0;
    }
}
?>