<?php

class ErrorManagement {
    
    private $method;
    
    
    function __construct($method){
        $this->method=$method;
    }
    
    
    public function render() {
        ob_start();
        include 'init.php';
        $bdd = Database::getDb();
        $bdd->beginTransaction();
        try {
            include($this->method."Content.php");
            $bdd->commit();
        } catch (Exception $e) {
            ob_end_clean();
            echo '<pre>';
            $bdd->rollBack();
            echo($e->getMessage());
            var_dump($e->getTrace());
            http_response_code(500);
        }
    }
}
