<?php 

class EvaluateUserView extends AbstractAdminView{
    private $user;
    private $results;
    
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
        if ($this->user!=null){
            $this->results=ResultModel::getResults($this->user);
        }
    }

    
    public function getHtml()
    {
        
        ?>
        user name : <?php echo $this->user->getLastname() ." ".$this->user->getFirstname()?>
        <?php if($this->isEdit()){?>
            <form method='post' action='index.php' id='evaluateUserForm'>
                <input type='hidden' name='page' value='EvaluateUser' />
                <input type='hidden' name='save' value='true' />
                <input type='hidden' name='userId' value='<?php echo $this->user->getId()?>' />
        <?php }?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">Project Evaluation</div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">Group Evaluation</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Step 1</div>
                <div class="col-1"><?php $this->getResultValueField(2,0,3)?></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Step 2</div>
                <div class="col-1"><?php $this->getResultValueField(3,0,3)?></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Step 3</div>
                <div class="col-1"><?php $this->getResultValueField(4,0,3)?></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Step 4</div>
                <div class="col-1"><?php $this->getResultValueField(5,0,3)?></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Final step</div>
                <div class="col-1"><?php $this->getResultValueField(6,0,3)?></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">Individual Evaluation</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Individual</div>
                <div class="col-1"><?php $this->getResultValueField(1,-2,2)?></div>
                <div class="col-1">2</div>
            </div>
        </div>

        <?php if($this->isEdit()){?>
            <a href="index.php?page=AdminUserLink" ><button type="button" class="btn btn-secondary">Cancel</button></a>
            <button type="button" class="btn btn-primary doSaveUserEvaluation">Submit</button>
            </form>
        <?php
        }
        
    }


    private function getResult($evaluationId){
        if (isset($this->results[''.$evaluationId])){
            return $this->results[''.$evaluationId]->getValue();
        }
        return '';
    }

    private function getResultValueField($idEvaluation, $minValue,$maxValue){
        if($this->isEdit()){
        ?>
            <input class="eval" type='number' name="result_<?php echo $idEvaluation?>"
                   min="<?php echo $minValue?>" max="<?php echo $maxValue?>"
                   value='<?php echo $this->getResult($idEvaluation)?>'/>
        <?php
        } else {
            echo $this->getResult($idEvaluation);
        }
    }
}

?>