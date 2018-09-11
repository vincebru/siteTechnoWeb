<?php

class AccesPoint {

    protected $executionResult;

    protected $page;

    private function init() {
        // start session
        session_start();

        //include utils function
        include 'utils/include.php';

        // database connexion
        //nothing todo, database connexion will be initialised when needed

        // control on user
        UserModel::init();
    }
    
    protected static function getFileData(){
        
        if (isset($_FILES["file"]) && isset($_FILES["file"]["tmp_name"])){
            $tmpFileName=$_FILES["file"]["tmp_name"];
            $mime=mime_content_type($tmpFileName);
            $file=fopen($tmpFileName, 'rb');
            return array('mime'=> $mime,'file'=> $file);
        }
        return array();
    }

    protected function manageAction($refArray){
        
        if (class_exists($this->page)) {
            call_user_func (array($this->page,'checkAllowed'),$refArray);
            $action = new $this->page($refArray);
            $this->executionResult=$action->execute();
        } else {
            logDebug('no action for '.$this->page);
        }
    }

    public function render() {
         ob_start();
         $this->init();
         $bdd = Database::getDb();
         $bdd->beginTransaction();
        try {
            $this->display();
            $bdd->commit();
        } catch (Exception $e) {
            ob_end_clean();
            echo '<pre>';
            echo($e->getMessage());
            var_dump($e->getTrace());
            $bdd->rollBack();
            http_response_code(500);
        }
    }
} 