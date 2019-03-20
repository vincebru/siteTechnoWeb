<?php

class ResultModel
{
    
    public static function getResults($user){
        //         $request = "
        //             SELECT * from evaluation parent
        //             join evaluation_link link1 on parent.evaluation_id=link1.parent_id
        //             join evaluation child on link1.child_id=child.evaluation_id
        //             left join evaluation_link link2 on child.evaluation_id=link2.parent_id
        //             left join evaluation subchild on subchild.evaluation_id=link2.child_id
        //             WHERE parent.session_group_id=1 and parent.name='Global'";
        
        $request ="select * from result where user_id =:userId";
        
        $param= array('userId'=>$user->getId());
        if ($user->getWorkGroupId()!=null){
            $request .=" or group_id=:groupId";
            $param['groupId']=$user->getWorkGroupId();
        }
        
        $bdd = Database::getDb();
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute($param);
        $result=array();
        while($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
            $result[$data['evaluation_id']]= new Result($data);
        }
        
        return $result;
    }
    
    
    public static function getEvaluations($evaluationId){
        $result= array();
        $evaluationsChild=GlobalModel::getAll('Evaluation',' and '.Evaluation::$parentId.'=:'.Evaluation::$parentId,
            array(Evaluation::$parentId=>$evaluationId) );
        $result[$evaluationId] = array();
        foreach ($evaluationsChild as $child){
            $result[$evaluationId][$child->getId()]=self::getEvaluations($child->getId())[$child->getId()];
        }
        return $result;
    }
    
}