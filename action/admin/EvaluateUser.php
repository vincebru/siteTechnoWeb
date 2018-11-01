<?php 

class EvaluateUser  extends WriteAction{
    
    private $user;
    private $results;
    private $evaluations;
    
    function __construct($data){
        parent::__construct($data);
        $this->user=GlobalModel::getInstance('User',$data['userId']);
        $this->results=ResultModel::getResults($this->user);
        $this->evaluations=GlobalModel::getAllFromIds('Evaluation',array_keys($this->getResultToSave("result_")));
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
            $resultCommentToSave=$this->getResultToSave("result_comment_");
            foreach ($this->getResultToSave("result_") as $evaluationId => $value){
                $comment='';
                if(isset($resultCommentToSave[$evaluationId])){
                    $comment=$resultCommentToSave[$evaluationId];
                }
                $resultParam=array(
                    Result::$evaluationId => $evaluationId,
                    Result::$value => $value,
                    Result::$comment => $comment
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
                } else if($this->results[$evaluationId]->getValue()!=$value
                        || $this->results[$evaluationId]->getComment()!=$comment){
                    //update value
                    $resultParam['id']=$this->results[$evaluationId]->getId();
                    GlobalModel::patchInstance('Result',$resultParam);
                }
            }
            $this->viewClass = 'AdminUserLinkView';
        }
        return $this->getview();
    }
    
    private function getResultToSave($prefix){
        $resultsValueToSave= array();
        foreach ($this->data as $key=>$value){
            if ($this->isAResultKey($key,$prefix) && $value!=''){
                $resultId=str_replace($prefix,"",$key);
                $resultsValueToSave[$resultId]=$value;
            }
        }
        return $resultsValueToSave;
    }
    
    private function isAResultKey($key,$prefix){
        return strpos($key, $prefix) === 0;
    }
}
?>