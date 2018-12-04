<?php
/**
 * Update the password of a specific user selected by his id 
 *
 * @package WriteAction
 * @author  Grégoire Gaonach
 */
class UpdatePasswordUser extends WriteAction{

    private $userId;

    function __construct($data){
        parent::__construct($data);
        $this->user=GlobalModel::getInstance('User',$data['userId']);
        //var_dump($this->user); die();
    }
    
    public static function checkAllowed($refArray){
        if(!UserModel::isAdminConnectedUser()) {            
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }

    /**
     * Main function : update the password of a user
     *
     * @author Grégoire Gaonach
     */
    public function execute() {

        if(isset($this->data["newPassword"])){
            if (!isset($this->data["newPassword"]) || !isset($this->data["confirmPassword"])
                    || $this->data["newPassword"]!=$this->data["confirmPassword"]) {
                
                $message="Bad confirmation password";
                throw new TechnowebException($message,$message);
            
            } else {

                UserModel::updatePassword($this->user,$this->data["newPassword"]);

                $class = new AdminUserView($this->data);
                $this->currentView = $class;
                return $this->getview();
            
            } 
        }      

        $class = new AdminUpdatePasswordView($this->data);
        $this->currentView = $class;
        return $this->getview();

    }

}