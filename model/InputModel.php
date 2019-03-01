<?php

class InputModel
{
    
        
    public static $acceptedMime = array(
            
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
//             'swf' => 'application/x-shockwave-flash',
//             'flv' => 'video/x-flv',
            
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
//             'tiff' => 'image/tiff',
//             'tif' => 'image/tiff',
//             'svg' => 'image/svg+xml',
//             'svgz' => 'image/svg+xml',
            
            // archives
            'zip' => 'application/zip',
            'zipw' => 'inode/x-empty',
            'rar' => 'application/x-rar-compressed',
//             'exe' => 'application/x-msdownload',
//             'msi' => 'application/x-msdownload',
//             'cab' => 'application/vnd.ms-cab-compressed',
            
            // audio/video
//             'mp3' => 'audio/mpeg',
//             'qt' => 'video/quicktime',
//             'mov' => 'video/quicktime',
            
            // adobe
            'pdf' => 'application/pdf',
//             'psd' => 'image/vnd.adobe.photoshop',
//             'ai' => 'application/postscript',
//             'eps' => 'application/postscript',
//             'ps' => 'application/postscript',
            
            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            
            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );
    
    
    public static function addOrUpdateValue($formData){
        //recuperation de l'element formulaire et de ses enfants
        $form = GlobalModel::getInstance("Form", $formData["form_id"]);
        $toSave=array();
        // boucle sur les enfants pour connaitre le type
        foreach ($form->getSubElements() as $subElementId) {
            //en fonction du type des enfant on crée ou update un input_value ou un input_file
            $subElement = GlobalModel::getElement($subElementId);
            
            $data=array();
            $data[InputValue::$userId]=UserModel::getConnectedUser()->getId();
            $data[InputValue::$elementId]=$subElementId;
            
            // on controle et on formate les données
            if ($subElement instanceof Input){
                $treatmentToDo = true; // treatment to do only if iinput values are set for current input
                if ($subElement instanceof InputFile) {
                    $data['object']="InputFileValue";
                    /// gerer le cas ou le fichier n'est pas fourni
                    if (array_key_exists($subElement->getContent(),$formData)) {
                        // on verifie que le fichier est du bon type.
                        $inputFile=CacheElementsManager::getElement($subElementId);
                        $mimeAllowedList = static::getMimeAllowedList($inputFile);
                        if (!in_array($formData[$subElement->getContent()]['mime'], array_values($mimeAllowedList))){
                            throw new TechnowebException('NotAllowedMime', 'Mime '.$formData[$subElement->getContent()]['mime'].' is not allowed');
                        }
                        $data=array_merge($data, $formData[$subElement->getContent()]);
                    } else {
                        $treatmentToDo = false;
                    }
                    
                } else {
                    $data['object']="InputTextValue";
                    $data[InputTextValue::$inputValue] = $formData[$subElement->getContent()];
                }
                if ($treatmentToDo){
                    $toSave[]=$data;
                }
            }
        }
        //on insere toutes les données si elles sont toutes ok
        foreach ($toSave as $data){
            $existing = GlobalModel::getDtoFromUniqueConstraints ($data['object'], $data);
            if ($existing ==null){
                $id=GlobalModel::createInstance($data['object'], $data);
            } else {
                $id=$existing->getId();
                $data['id']=$id;
                GlobalModel::patchInstance($data['object'], $data);
            }
        }
    }

    public static function populateInput($input){
        $currentUserId= UserModel::getConnectedUser()->getId();
        if ($input->getInputValue($currentUserId) == null){
            $input->addInputValue($currentUserId, self::getInputValue($input->getId()));
        }
    }
    
    
    private static function getMimeAllowedList($inputFile){
        $mimeAllowedList=static::$acceptedMime;
        if($inputFile->getMimeAllowed()!=""){
            $codeMimeAllowedList = explode(';', $inputFile->getMimeAllowed());
            $mimeAllowedList = array();
            foreach ($codeMimeAllowedList as $codeMimeAllowed){
                if (array_key_exists($codeMimeAllowed, static::$acceptedMime)){
                    $mimeAllowedList[$codeMimeAllowed] = static::$acceptedMime[$codeMimeAllowed];
                }
            }
        }
        return $mimeAllowedList;
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
    
    public static function getAllInputValuesGroupByUserId($formId){
        $request = "SELECT iv.input_value_id, iv.type, iv.element_id, iv.user_id, ".
            "itv.input_value, ".
            "ifv.mime, ".
            "ifv.name, ".
            "ifv.file ".
            "FROM `input_value` iv ".
            "join element e on e.element_id=iv.element_id ". 
            "left join input_text_value itv on itv.input_value_id=iv.input_value_id ".
            "left join input_file_value ifv on ifv.input_value_id=iv.input_value_id ".
            "WHERE  ".
            "e.parent_id=:formId";
        
        $bdd = Database::getDb();
        $preparedRequest = $bdd->prepare($request);
        $preparedRequest->execute(array("formId" => $formId));
        $result=array();
        while ($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)) {
            $className = $data["type"];
            if (!array_key_exists($data["user_id"],$result)){
                $result[$data['user_id']] = array();
            }
            $result[$data['user_id']][]= new $className($data);
        }
        return $result;
    }
}
