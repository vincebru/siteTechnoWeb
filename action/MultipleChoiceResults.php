<?php
/**
 * Display a specific Mulitple Choice Exercice
 *
 * @author Grégoire Gaonach
 */
class MultipleChoiceResults extends WriteAction{

    private $MultipleChoiceId;

    function __construct($data){
        parent::__construct($data);
        $this->MultipleChoiceId = $data['MultipleChoiceId'];
        $this->viewClass = 'MultipleChoiceResultsView';
    }

    public static function checkAllowed($refArray){
        $object = static::getValue($refArray, 'object');
        if($object!='' && !GlobalModel::isUpdateAllowed($object)){
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }

    public function execute() {

        if(!UserModel::isConnected()) {
            $class->setMsg('You must be logged in to answer a Multiple Choice Exercice');
            $this->currentView = $class;
            return $this->getview();
        }

        return $this->getview();
    }
}