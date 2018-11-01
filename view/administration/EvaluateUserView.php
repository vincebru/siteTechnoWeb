<?php 

class EvaluateUserView extends AbstractAdminView{
    private $user;
    private $group;
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
        $this->group=null;
        if ($this->user!=null    && $this->user->getWorkGroupId()!=null){
            $this->group = GlobalModel::getInstance("WorkGroup",$this->user->getWorkGroupId());
        }

        if ($this->user!=null){
            $this->results=ResultModel::getResults($this->user);
        }
    }


    public function checkAllowed() {
        if($this->isEdit() && !UserModel::isAdminConnectedUser()) {
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }
    
    public function getHtml()
    {

        if ($this->user==null){
            throw new TechnowebException('NeedAuthentication', 'NeedAuthentication');
        }
        ?>
        user name : <?php echo $this->user->getLastname() ." ".$this->user->getFirstname()?>
        <?php if($this->isEdit()){?>
            <form method='post' action='index.php' id='evaluateUserForm'>
                <input type='hidden' name='page' value='EvaluateUser' />
                <input type='hidden' name='save' value='true' />
                <input type='hidden' name='userId' value='<?php echo $this->user->getId()?>' />
        <?php }?>
        <div class="container-fluid table">
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

    private function getResultComment($evaluationId){
        if (isset($this->results[''.$evaluationId])){
            return $this->results[''.$evaluationId]->getComment();
        }
        return '';
    }


    private function getResultCommentField($idEvaluation){
        if($this->isEdit()){
            ?>
            <textarea class="evalComment" name="result_comment_<?php echo $idEvaluation?>"
                  ><?php echo $this->getResultComment($idEvaluation)?></textarea>
        <?php
        } else {
            echo str_replace("\n", '<br />',htmlspecialchars($this->getResultComment($idEvaluation)));
        }
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