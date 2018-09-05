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
            $class=$this->method.'Content';
            $renderer = new $class();
            $renderer->render();
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
