<?php 

class AdminFormValuesView extends AbstractAdminView{
    
    private $isGrouped;
    
    private $sessionGroupId;
    
    private $form;
    private $formValues;
    
    
    
    public function __construct($args)
    {
        parent::__construct($args);
        $this->jsFiles['adminUser'] = 'adminUser';
        $this->isGrouped=false;
        if(isset($args['isGrouped'])){
            $this->isGrouped=true;
        }
        $this->sessionGroupId="";
        if (isset($this->args['sessionGroupId'])){
            $this->sessionGroupId=$this->args['sessionGroupId'];
        }
        if (isset($this->args['formId'])){
            $this->setFormId($this->args['formId']);
        }
    }
    
    public function getHtml()
    {
        $this->displaySessionGroupForm();
        
        if ($this->displayFormsForm()){
            $this->displayUserTable();
        }
        
        // pour la session courante recuperer tous les formulaires existants en parcourant l'arborescence
        // ou recuperation de tous les formulaires et on recupere leur lesson associée (utilisation de element::isRootElements())
        
        // ds une liste de choix on propose tous les lesson/formanme correspondant a la session choisie
        
        // pour la session et le formulaire choisi, on affiche tous les users/group avec la completude du formulaire et un lein pour afficher le details   
        
    }
    
    private function setformId($formId){
        $this->form = GlobalModel::getInstance('Form',$formId);
        //populate $this->formValue
        $this->formValues = InputModel::getAllInputValuesGroupByUserId($formId);
    }
    
    private function getUrlGroup(){
        $url = "?page=AdminFormValuesLink&sessionGroupId=".$this->sessionGroupId."&formId=".$this->form->getId();
        if ($this->isGrouped){
            return $url;
        } else {
            return $url."&isGrouped=true";
        }
    }
    
    private function displayUserTable(){
        
        $groupBy="lastname,firstname, user_id";
        if ($this->isGrouped){
            $groupBy="work_group_id, ".$groupBy;
        }
        
        
        $userList = UserModel::getUsersBySessionGroupId($this->sessionGroupId , $groupBy);
        ?>
        <div class="container-fluid table">
          <div class="row">
            <div class="col-3">Name</div>
            <div class="col-3">Firstname</div>
            <div class="col-2">
            	Group id
            		<a href='<?php echo $this->getUrlGroup()?>'>
                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm" >
                            <i class="fa fa-group" id='container'>
                            	<?php if($this->isGrouped){?><i class="fa fa-ban nested"></i><?php }?>
                            </i>
                        </button>
                  	</a>
            </div>
            <div class="col-4"></div>
          </div>
          <?php 
          $groupId = -1;
          foreach ($userList as $user) {
              if($user->getWorkGroupId() != $groupId){
                  $groupId=$user->getWorkGroupId();
                  if($this->isGrouped){
                      $workgroup=null;
                      if (isset($groupId) && $groupId!=''){
                          $workgroup=GlobalModel::getInstance('WorkGroup',$groupId);
                      }
                       ?>
                          <div class="row">
                            <div class="col-12">
                                <?php if( $workgroup!=null) {
                                    echo 'Group name:'.$workgroup->getName()." (<a href='https://github.com/".$workgroup->getRepository()."'>".$workgroup->getRepository().")</a>";
                                ?><a href='index.php?page=UpdateGroup&groupId=<?php echo $workgroup->getId()?>&sessionGroupId=<?php echo $this->sessionGroupId ?>'>
                                    <button type="button" class="btn btn-outline-primary mr-1 btn-sm">
                                        <i class="fa fa-pencil" id='container'></i>
                                    </button>
                                </a>
                                <?php
                                } else {
                                    echo 'NoGroup';
                                }
                               ?>

                            </div>
                          </div>
                       <?php 
                  }
              }
          ?>
          <div class="row">
            <div class="col-3"><?php echo $user->getLastname()?></div>
            <div class="col-3"><?php echo $user->getFirstname()?></div>
            <div class="col-2"><?php echo $user->getWorkGroupId()?></div>
            <div class="col-4"><?php $this->displayUserFormValues($user->getId())?></div>
          </div>
          <?php }?>
        </div>
        
        
    <?php
        
    }
    
    private function displayUserFormValues($userId){
        $values = $this->getValuesForUser($userId);
        if ($values == null ){
            echo " pas de valeur pour ce user";   
        } else {
            foreach ($values as $inputValue){
                $input = CacheElementsManager::getElement($inputValue->getElementId());
                if ( $inputValue instanceof InputTextValue){
                    echo $input->getLabel().": ".$inputValue->getInputValue()."<br />";
                } else {
                    echo $input->getLabel().": <a href='file.php?id=". $inputValue->getId()."&type=InputFileValue' download='".$inputValue->getName().
                        "' ><i class='fa fa-check-circle-o' id='container'></i></a><br />";
                }
            }
        }
    }
    
    private function getValuesForUser($userId){
        if (array_key_exists($userId, $this->formValues)){
            return $this->formValues[$userId];
        }
        return null; 
    }
    
    private function displayFormsForm(){
        
        $formByLesson = LessonModel::getFormForSession($this->sessionGroupId);
        if (empty($formByLesson)){
            ?>Il n' y a pas de formulaire a traiter<?php
            return false;
        }else{
        ?>
        <form id="FormsForm" action='index.php' method="get">
        	<input type='hidden' name='page' value='AdminFormValuesLink' />
        	<input type='hidden' name='sessionGroupId' value='<?php echo $this->sessionGroupId?>' />
            <select name='formId' id='formId'>
            <?php 
            $isFirstOption = true;
            foreach ($formByLesson as $lessonName => $forms){
                foreach ($forms as $form){
                    if ($isFirstOption){
                        $isFirstOption=false;
                        if ($this->form==null){
                            $this->setFormId($form->getId());
                        }
                    }
                    ?>
                	<option value='<?php echo $form->getId()?>' <?php if ($form->getId()==$this->form->getId()){echo 'selected';}?>>
                		<?php echo $lessonName."-".$form->getContent()?>
                	</option>
            	<?php  }?>
            <?php  }?>
            </select>
        </form>
        <?php
            return true;
        }
    }
    
    private function displaySessionGroupForm(){
        $sessionGroupList = GlobalModel::getAll(SessionGroup::class, null, null);
        ?>
        <form id="sessionGroupForm" action='index.php' method="get">
        	<input type='hidden' name='page' value='AdminFormValuesLink' />
        	<?php if ($this->isGrouped) {?>
        		<input type='hidden' name='isGrouped' value='true' />
        	<?php }?>
            <select name='sessionGroupId' id='sessionGroupId'>
            <?php 
            $isFirstOption = true;
            foreach ($sessionGroupList as $sessionGroup){
                if ($isFirstOption){
                    $isFirstOption=false;
                    if ($this->sessionGroupId==""){
                        $this->sessionGroupId=$sessionGroup->getId();
                    }
                }
                ?>
            	<option value='<?php echo $sessionGroup->getId()?>' <?php if ($sessionGroup->getId()==$this->sessionGroupId){echo 'selected';}?>>
            		<?php echo $sessionGroup->getName()?>
            	</option>
            <?php  }?>
            </select>
        </form>
        <?php
    }


}


?>
