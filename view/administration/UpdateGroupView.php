<?php

class UpdateGroupView extends AbstractAdminView{
    private $group;
    private $users;
    private $sessionGroupId;

    public function __construct($args)
    {
        //useful array_merge($args,array(AbstractLinkView::PROPERTY_MENU=>'Result')); ?
        parent::__construct($args);
        $this->jsFiles['adminUser'] = 'adminUser';
        $this->group=GlobalModel::getInstance('WorkGroup',$args['groupId']);
        $this->users = GlobalModel::getAll("User", " where work_group_id=:group_id", array('group_id'=> $args['groupId']));
        $this->sessionGroupId=$this->args['sessionGroupId'];
    }

    private function getAllUserWithoutGroup(){
        $usersWithoutgroup = GlobalModel::getAll("User",
            " where work_group_id is null and session_group_id=:sessionGroupId",
            array('sessionGroupId'=> $this->sessionGroupId));

        return $usersWithoutgroup;
    }

    public function getHtml()
    {
        echo 'Users:<br/>';
        foreach($this->users as $user){
            echo $user->getLastname(). " ". $user->getFirstname()."<br/>";
        }

        $usersWithoutGroup = $this->getAllUserWithoutGroup();

        //echo "<pre>";
        //var_dump($usersWithoutGroup);

        if (!empty($usersWithoutGroup   )){

            ?>
            <form action="index.php" id="addUserToFormGroup" method="post">
                <input type="hidden" name="page" value="AddUserToGroup" />
                <input type="hidden" name="groupId" value="<?php echo $this->group->getId() ?>" />
                <input type="hidden" name="sessionGroupId" value="<?php echo $this->sessionGroupId ?>" />
                <select name="userId">
                    <?php foreach($usersWithoutGroup as $userWithoutGroup){ ?>
                        <option value="<?php echo $userWithoutGroup->getId()?>">
                            <?php echo $userWithoutGroup->getLastname(). " ". $userWithoutGroup->getFirstname()?>
                        </option>
                    <?php } ?>
                </select>
                <button type="button" class="btn btn-outline-primary mr-1 btn-sm doAddUserToGroup">
                    <i class="fa fa-plus" id='container'></i>
                </button>
            </form>
        <?php
        }


    }
}