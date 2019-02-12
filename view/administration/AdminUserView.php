<?php 

class AdminUserView extends AbstractAdminView{
    
    private $isGrouped;
    
    private $sessionGroupId;
    
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
    }
    
    private function getUrlGroup(){
        $url = "?page=AdminUserLink&sessionGroupId=".$this->sessionGroupId;
        if ($this->isGrouped){
            return $url;
        } else {
            return $url."&isGrouped=true";
        }
    }
    
    public function getHtml()
    {
        $this->getSessionGroupForm();
        
        $groupBy="user_id";
        if ($this->isGrouped){
            $groupBy="work_group_id, user_id";
        }
        
        $userList = UserModel::getUsersBySessionGroupId($this->sessionGroupId , $groupBy);
        ?>
        <div class="container-fluid table">
          <div class="row">
          	<div class="col-1"></div>
            <div class="col-4">Name</div>
            <div class="col-4">Firstname</div>
            <div class="col-2">
            	Group id
            		<a href='<?php echo $this->getUrlGroup()?>'>
                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm" >
                            <i class="fa fa-group" id='container'>
                            	<?php if($this->isGrouped){?><i class="fa fa-ban nested"></i><?php }?>
                            </i>
                        </button>
                  	</a>
                    <button type="button" class="btn btn-outline-primary mr-1 btn-sm addWorkGroup" 
            			data-toggle="modal" data-target="#AddWorkGroupModal" id="createGroupBtn">
                        <i class="fa fa-plus"></i>
                    </button>
            </div>
            <div class="col-1"></div>
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
            <div class="col-1">
            	
            	<a href='index.php?page=EvaluateUser&userId=<?php echo $user->getId()?>&edit=true'>
                	<button type="button" class="btn btn-outline-primary mr-1 btn-sm" 
                	data-toggle="modal" data-target="#EvaluationModal" id="evaluationBtn">
                    	<i class="fa fa-pencil" id='container'></i>
                    </button>
                </a>
            </div>
            <div class="col-4"><?php echo $user->getLastname()?></div>
            <div class="col-4"><?php echo $user->getFirstname()?></div>
            <div class="col-2"><?php echo $user->getWorkGroupId()?></div>
            <div class="col-1"><input type='checkbox' class="workGroupBy" data-user-id='<?php echo $user->getId()?>'></div>
          </div>
          <?php }?>
        </div>
        <?php $this->buildModalHtml(ElementView::ACTION_ADD, 'WorkGroup'); ?>
        
        <div class="container mt-3">
        <?php 
            //<p>To contact us, just add a ticket on Github: <a href="https://github.com/vincebru/siteTechnoWeb/issues">here</a>.</p>
            ?>
        </div>
        
        <div class="initForms">
        	<div id='addUserGroup'>
            	<form id="addUserGroupForm">
            		<input type='hidden' name='usersId' id='usersId' />
            		<input type='hidden' name='object' value='WorkGroup' />
        			<input type='hidden' name='action' value='PostWorkGroup' />
            		GitHub repository: <input type='text' name='repository' />
            	</form>
            </div>
        </div> 
    <?php
    }
    
    private function getSessionGroupForm(){
        $sessionGroupList = GlobalModel::getAll(SessionGroup::class, null, null);
        ?>
        <form id="sessionGroupForm" action='index.php' method="get">
        	<input type='hidden' name='page' value='AdminUserLink' />
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
            	<option value='<?php echo $sessionGroup->getId()?>' <?php if ($sessionGroup->getId()==$this->sessionGroupId){echo 'selected';}?>><?php echo $sessionGroup->getName()?></option>
            <?php  }?>
            </select>
        </form>
        <?php
    }


}


?>
