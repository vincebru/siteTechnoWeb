<?php 

class EvaluateUserView extends AbstractAdminView{
    private $user;
    private $group;
    private $results;
    private $evaluations;
    
    public function __construct($args)
    {
        //useful array_merge($args,array(AbstractLinkView::PROPERTY_MENU=>'Result')); ?
        parent::__construct($args);
        if ($this->isEdit()){
            $this->jsFiles['adminUser'] = 'adminUser';
            $this->user=GlobalModel::getInstance('User',$args['userId']);
        } else{
            $this->user=UserModel::getConnectedUser();
        }
        $this->group=null;
        if ($this->user!=null    && $this->user->getWorkGroupId()!=null){
            $this->group = GlobalModel::getInstance("WorkGroup",$this->user->getWorkGroupId());
        }
        $this->evaluations=array();
        if ($this->user!=null){
            if ($this->user->getSessionGroupId()!=null){
                $session=GlobalModel::getInstance('SessionGroup',$this->user->getSessionGroupId());
                if ($session!=null &&  $session->getEvaluationId()!=0){
                    $this->evaluations=ResultModel::getEvaluations($session->getEvaluationId());
                }
            }
            
            
            
            $this->results=ResultModel::getResults($this->user);
        }
    }


    public function checkAllowed() {
        if($this->isEdit() && !UserModel::isAdminConnectedUser()) {
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }
    
    private function displayTab($evaluations,$rg){
        $result = null;
        $sumCoef=0;
 
        foreach($evaluations as $evaluationId => $childs ){
            
            $currentResult = $this->getResult($evaluationId);
            if ($currentResult==''){
                $currentResult = null;
            }
            
            $evaluation=GlobalModel::getInstance('Evaluation',$evaluationId);
            
            
            ?>
            <?php if (!empty($childs)){?>
            <div class="row">
            	<div class="col-<?php echo $rg?>"></div>
            	<div class="col-<?php echo 12-$rg?>"><?php echo $evaluation->getName();?></div>
            </div>
            <?php }
            $subResult=$this->displayTab($childs,$rg+1);
            if ($subResult!=null){
                $currentResult+=$subResult;
            }
            if ($currentResult!=null){
                if ($evaluation->getCoef()!=null){
                    $result+=$evaluation->getCoef()*$currentResult;
                    $sumCoef+=$evaluation->getCoef();
                }else{
                    $result+=$currentResult;
                }
            }
            
            ?>
            
            <div class="row">
                <div class="col-<?php echo $rg?>"></div>
                <div class="col-<?php echo 5-$rg?>"><?php if (!empty($childs)){?>Total <?php } echo $evaluation->getName(); ?></div>
                <div class="col-5"><?php if (empty($childs)){$this->getResultCommentField($evaluationId);}?></div>
                <div class="col-2">
                    <?php if (empty($childs)){?>
                    	<?php $this->getResultValueField($evaluationId,$evaluation->getMinValue(),$evaluation->getMaxValue())?>
                    	/<?php echo $evaluation->getMaxValue()?>
                	<?php } else {
                	    echo $currentResult;
                	}?>
                </div>
            </div>
            <?php
        }
        if($sumCoef>0){
            $result=$result/$sumCoef;  
        }
        return $result;
    }
    
    public function getHtml()
    {

        if ($this->user==null){
            throw new TechnowebException('NeedAuthentication', 'NeedAuthentication');
        }
        ?>
        user name : <?php echo $this->user->getLastname() ." ".$this->user->getFirstname()?>
        <?php 
        
        if (!empty($this->evaluations)){
            if($this->isEdit()){?>
                <form method='post' action='index.php' id='evaluateUserForm'>
                    <input type='hidden' name='page' value='EvaluateUser' />
                    <input type='hidden' name='save' value='true' />
                    <input type='hidden' name='userId' value='<?php echo $this->user->getId()?>' />
                    <input type='hidden' name='sessionGroupId' value='<?php echo $this->user->getSessionGroupId()?>' />
            <?php }
            ?>
        <div class="container-fluid table">
        <?php 
        if ($this->user->getSessionGroupId()==1){
            $this->displaySession1Tab();
        }else{
            $this->displayTab($this->evaluations,0);
        }
        ?>
        </div>

            <?php if($this->isEdit()){?>
                <a href="index.php?page=AdminUserLink" ><button type="button" class="btn btn-secondary">Cancel</button></a>
                <button type="button" class="btn btn-primary doSaveUserEvaluation">Submit</button>
                </form>
            <?php
            }
        }
        
    }

    private function getResult($evaluationId){
        if (isset($this->results[''.$evaluationId])){
            return $this->results[''.$evaluationId]->getValue();
        }
        return '';
    }

    private function getResultComment($evaluationId){
        if (isset($this->results[''.$evaluationId])){
            return $this->results[''.$evaluationId]->getComment();
        }
        return '';
    }


    private function getResultCommentField($evaluationId){
        if($this->isEdit()){
            ?>
            <textarea class="evalComment" name="result_comment_<?php echo $evaluationId?>"
                  ><?php echo $this->getResultComment($evaluationId)?></textarea>
        <?php
        } else {
            echo str_replace("\n", '<br />',htmlspecialchars($this->getResultComment($evaluationId)));
        }
    }

    private function getResultValueField($evaluationId, $minValue,$maxValue){
        if($this->isEdit()){
        ?>
            <input class="eval" type='number' name="result_<?php echo $evaluationId?>"
                   min="<?php echo $minValue?>" max="<?php echo $maxValue?>" step="0.5"
                   value='<?php echo $this->getResult($evaluationId)?>'/>
        <?php
        } else {
            echo $this->getResult($evaluationId);
        }
    }
    
    private function displaySession1Tab(){
        ?>
        <div class="row">
        <div class="col-5">Project Evaluation</div>
        <div class="col-5">Comments</div>
        <div class="col-2">Results</div>
        </div>
        <?php if ($this->group!=null){ ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">Group Evaluation: <?php echo $this->group->getName()." (".$this->group->getRepository().")" ?></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Step 1</div>
                <div class="col-5"><?php $this->getResultCommentField(2)?></div>
                <div class="col-2"><?php $this->getResultValueField(2,0,3)?>/3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Step 2</div>
                <div class="col-5"><?php $this->getResultCommentField(3)?></div>
                <div class="col-2"><?php $this->getResultValueField(3,0,3)?>/3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Step 3</div>
                <div class="col-5"><?php $this->getResultCommentField(4)?></div>
                <div class="col-2"><?php $this->getResultValueField(4,0,3)?>/3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Step 4</div>
                <div class="col-5"><?php $this->getResultCommentField(5)?></div>
                <div class="col-2"><?php $this->getResultValueField(5,0,3)?>/3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Final step</div>
                <div class="col-5"><?php $this->getResultCommentField(6)?></div>
                <div class="col-2"><?php $this->getResultValueField(6,0,3)?>/3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Bonus</div>
                <div class="col-5"><?php $this->getResultCommentField(10)?></div>
                <div class="col-2"><?php $this->getResultValueField(10,0,2)?>/2</div>
            </div>
        <?php } ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">Individual Evaluation</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Individual</div>
                <div class="col-5"><?php $this->getResultCommentField(1)?></div>
                <div class="col-2"><?php $this->getResultValueField(1,-2,2)?>/2</div>
            </div>
        <?php if ($this->group!=null){ ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">Total</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Project</div>
                <div class="col-5"></div>
                <div class="col-2"><?php echo $this->getSum() ?>/20</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Examen</div>
                <div class="col-5"><?php $this->getResultCommentField(8)?></div>
                <div class="col-2"><?php $this->getResultValueField(8,0,20)?>/20</div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">Average</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">Average</div>
                <div class="col-5"><?php ?></div>
                <div class="col-2"><?php echo($this->getSum()+$this->getResult(8))/2?>/20</div>
            </div>
        <?php }
    }
    
    
    private function getSum(){
        return round(2*($this->getResult(2)+
            $this->getResult(3)+
            $this->getResult(4)+
            $this->getResult(5)+
            $this->getResult(6))*20/15,0,PHP_ROUND_HALF_UP )/2+
            $this->getResult(1)+
            $this->getResult(10);
    }
}

?>