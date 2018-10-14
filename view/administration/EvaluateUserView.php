<?php 

class EvaluateUserView extends AbstractAdminView{
    private $user;
    private $results;
    
    public function __construct($args)
    {
        parent::__construct($args);
        $this->jsFiles['adminUser'] = 'adminUser';
        $this->user=GlobalModel::getInstance('User',$args['userId']);
        $this->results=ResultModel::getResults($this->user);
    }
    
    private function getResult($evaluationId){
        if (isset($this->results[''.$evaluationId])){
            return $this->results[''.$evaluationId]->getValue();
        }
        return '';
    }
    
    public function getHtml()
    {
        
        ?>
        user id : <?php echo $this->user->getId()?>
        <form method='post' action='index.php'>
        <input type='hidden' name='page' value='EvaluateUser' />
        <input type='hidden' name='save' value='true' />
        <input type='hidden' name='userId' value='<?php echo $this->user->getId()?>' />
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
                <div class="col-1"><input class="eval" type='number' name="result_2" min="0" max="3" value='<?php echo $this->getResult(2)?>'/></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Step 2</div>
                <div class="col-1"><input class="eval" type='number' name="result_3" min="0" max="3" value='<?php echo $this->getResult(3)?>'/></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Step 3</div>
                <div class="col-1"><input class="eval" type='number' name="result_4" min="0" max="3" value='<?php echo $this->getResult(4)?>'/></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Step 4</div>
                <div class="col-1"><input class="eval" type='number' name="result_5" min="0" max="3" value='<?php echo $this->getResult(5)?>'/></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Final step</div>
                <div class="col-1"><input class="eval" type='number' name="result_6" min="0" max="3" value='<?php echo $this->getResult(6)?>'/></div>
                <div class="col-1">3</div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">Individual Evaluation</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">Individual</div>
                <div class="col-1"><input class="eval" type='number' name="result_1" min="-2" max="2" value='<?php echo $this->getResult(1)?>'/></div>
                <div class="col-1">2</div>
            </div>
        </div>
        <input type='submit' value='save'/>
        </form>
        <?php 
        
    }
}

?>