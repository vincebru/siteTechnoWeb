<?php 
class PostWorkGroup extends Post{
    
    
    public function execute() {
        $allUsers = GlobalModel::getAllFromIds('User',explode(',', $this->data['usersId']));
        
        $isFirst=true;
        $this->data['name']='';
        foreach($allUsers as $user){
            if ($isFirst){
                $isFirst=false;
            } else {
                $this->data['name'].='-';
            }
            $this->data['name'].=$user->getLastname();
        }
        
        parent::execute();
        
        $this->data['id']; // a inserer dans la table user
        foreach ($allUsers as $user){
            GlobalModel::patchInstance('User', array('id'=>$user->getId(), User::$workGroupId => $this->data['id']));
        }
    }
    
}

?>