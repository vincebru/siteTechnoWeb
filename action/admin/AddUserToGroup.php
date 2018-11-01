<?php

class AddUserToGroup  extends WriteAction{

    private $userId;
    private $workGroupId;


    function __construct($data){
        parent::__construct($data);
        $this->userId=$data['userId'];
        $this->workGroupId=$data['groupId'];
    }

    public static function checkAllowed($refArray){
        if(!UserModel::isAdminConnectedUser()) {
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }

    public function execute() {

        GlobalModel::patchInstance('User', array('id'=>$this->userId, User::$workGroupId => $this->workGroupId));

        $this->viewClass = 'UpdateGroupView';

        return $this->getview();
    }
}