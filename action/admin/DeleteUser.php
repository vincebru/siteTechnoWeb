<?php
/**
 * Delete a specific user selected by his id 
 *
 * @package WriteAction
 * @author  Grégoire Gaonach
 */
class DeleteUser extends WriteAction{

    private $userId;

    function __construct($data){
        parent::__construct($data);
        $this->userId=$data['userId'];
        $this->viewClass = 'AdminUserView';
    }

    // Check if the current user is an admin
    public static function checkAllowed($refArray){
        if(!UserModel::isAdminConnectedUser()) {
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }

    /**
     * Main function : delete the user
     *
     * @author Grégoire Gaonach
     */
    public function execute() {

        // Delete user
        GlobalModel::removeInstance('User', $this->data['userId']);

        $class = new AdminUserView($this->data);
        $this->currentView = $class;
        return $this->getview();

    }

}