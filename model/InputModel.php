<?php

class InputModel
{
    public static function addOrUpdateValue($formData){
        //recuperation de l'element formulaire et de ses enfants
        $form = GlobalModel::getInstance("Form", $formData["form_id"]);
        // boucle sur les enfants pour conniatre le type
        foreach ($form->getSubElements() as $subElementId) {
            //en fonction du type des enfant on crée ou update un input_value ou un input_file
            $subElement = GlobalModel::getElement($subElementId);
            
            $inputValueClass="";
            $data=array();
            $data[InputValue::$userId]=UserModel::getConnectedUser()->getId();
            $data[InputValue::$elementId]=$subElementId;
            
            if ($subElement instanceof Input){
                $treatmentToDo = true; // treatment to do only if iinput values are set for current input
                if ($subElement instanceof InputFile) {
                    $inputValueClass="InputFileValue";
                    /// gerer le cas ou le fichier n'est pas fourni
                    if (array_key_exists($subElement->getContent(),$formData)) {
                        $data=array_merge($data, $formData[$subElement->getContent()]);
                    } else {
                        $treatmentToDo = false;
                    }
                    
                } else {
                    $inputValueClass="InputTextValue";
                    $data[InputTextValue::$inputValue] = $formData[$subElement->getContent()];
                }
                if ($treatmentToDo){
                    $existing = GlobalModel::getDtoFromUniqueConstraints ($inputValueClass, $data);
                    $data['object']=$inputValueClass;
                    if ($existing ==null){
                        $id=GlobalModel::createInstance($inputValueClass, $data);
                    } else {
                        $id=$existing->getId();
                        $data['id']=$id;
                        GlobalModel::patchInstance($inputValueClass, $data);
                    }
                }
            }
        }
    }

    public static function populateInput($input){
        $currentUserId= UserModel::getConnectedUser()->getId();
        if ($input->getInputValue($currentUserId) == null){
            $input->addInputValue($currentUserId, self::getInputValue($input->getId()));
        }
    }
    
    
    public static function getInputValue($elementId)
    {
        $bdd = Database::getDb();
        $request = "select * from input_value where ".InputValue::$elementId."=:".InputValue::$elementId.
        " and ".InputValue::$userId."=:".InputValue::$userId;
        $preparedRequest = $bdd->prepare($request);
        $param= array(InputValue::$elementId => $elementId,
            InputValue::$userId => UserModel::getConnectedUser()->getId()
        );
        $preparedRequest->execute($param);
        if ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            return GlobalModel::getInstance($data[InputValue::$type], $data['input_value_id']);
        } 
        return null;
    }
}
