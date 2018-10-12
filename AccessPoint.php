<?php

abstract class AccessPoint {

    protected $executionResult;

    protected $page;
    
    protected $view;

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

    abstract protected function display();
    
    protected static function getFileData(){
        
        if (isset($_FILES["file"]) && isset($_FILES["file"]["tmp_name"])){
            $tmpFileName=$_FILES["file"]["tmp_name"];
            $mime=mime_content_type($tmpFileName);
            $file=fopen($tmpFileName, 'rb');
            return array('mime'=> $mime,'file'=> $file, 'name' => $_FILES["file"]["name"]);
        }
        return array();
    }

    protected function manageAction($refArray){
        if (class_exists($this->page)) {
            call_user_func (array($this->page,'checkAllowed'),$refArray);
            $action = new $this->page($refArray);
        } else {
            logDebug('no action for '.$this->page);
            $action = new Action($refArray);
        }
        $this->view=$action->execute();
    }

    public function render() {
         ob_start();
         $this->init();
         $bdd = Database::getDb();
         $bdd->beginTransaction();
        try {
            $this->display();
            $bdd->commit();
        } catch (TechnowebException $e) {
            ob_end_clean();
            echo($e->getFunctionnalMessage());
            vardumpDebug($e->getTrace());
            $bdd->rollBack();
            http_response_code(500);
        } catch (Exception $e) {
            ob_end_clean();
            vardumpDebug($e->getTrace());
            $bdd->rollBack();
            http_response_code(500);
        }
    }
} 