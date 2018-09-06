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

    protected function manageAction($refArray){

        if (class_exists($this->page)) {
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