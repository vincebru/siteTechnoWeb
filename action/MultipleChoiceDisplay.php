<?php
/**
 * Display a specific Mulitple Choice Exercice
 *
 * @author Grégoire Gaonach
 */
class MultipleChoiceDisplay extends WriteAction{

    private $MultipleChoiceId;

    function __construct($data){
        parent::__construct($data);
        $this->MultipleChoiceId = $data['MultipleChoiceId'];
        $this->viewClass = 'MultipleChoiceDisplayView';
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

        # The form is sent :
        if($this->data['sent'] == '1'){

            $answers = array_filter($this->data, function($v){return $v=="on";});
            foreach ($answers as $k => $v) {
                MultipleChoiceUsersModel::addAnswers(UserModel::getCurrentId(), explode("-", $k)[1]);
            }

        }

        return $this->getview();
    }
}