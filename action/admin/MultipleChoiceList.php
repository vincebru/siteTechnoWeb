<?php
/**
 * Display the admin view of the Multiple Choice function
 *
 * @author Grégoire Gaonach
 */
class MultipleChoiceList extends WriteAction{

    private $MultipleChoiceId;

    function __construct($data){
        parent::__construct($data);
    }

    public static function checkAllowed($refArray){
        if(!UserModel::isAdminConnectedUser()) {
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }

    public function execute() {

        $this->viewClass = 'AdminMultipleChoice';
        return $this->getview();
    }
}