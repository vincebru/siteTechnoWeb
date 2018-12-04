<?php

include_once 'AccessPoint.php';

// Paramètres
date_default_timezone_set('Europe/Paris');
// On passe le error reporting en 1 (le -1 affiche les notices)
error_reporting(1);

class Index extends AccessPoint {
    
    
    private $header;
    private $contentHtml;

    protected function display(){
        // get action/page requested
        
        $refArray = $_GET;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $refArray = array_merge($_POST,static::getFileData());
        }
        
        $this->page = 'Main';
        if (isset($refArray['page'])) {
            $this->page = $refArray['page'];
        } 

        try {
            $this->manageAction($refArray);
        } catch (Exception $e) {
            if ($e instanceof TechnowebException){
                $refArray[MainView::MESSAGE_TO_DISPLAY_KEY]=$e->getFunctionnalMessage();
            }
            vardumpDebug($e->getTrace());
            $this->view = new MainView($refArray);
        }

        try {
            $this->view->checkAllowed();
            $this->contentHtml = $this->view->getViewHtml();
        } catch (Exception $e) {
            $refArray['errorMessage'] = $e->getMessage();
            $refArray['stack'] = $e->getTrace();
            $pagePath = 'ErrorView';
            $this->view = new $pagePath($refArray);
            $this->contentHtml = $this->view->getViewHtml();
        }
        $this->header = new Header($refArray,$this->view);

        $this->getHtml();
    }
    
    
    public function getHtml(){
        ?>
        <!DOCTYPE HTML>
        <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="css/bootstrap.min.css">
        
                <title>Techno web module</title>
                <?php
                    $cssFiles=array_merge($this->view->getCssFiles(), $this->header->getCssFiles());
                    foreach ($cssFiles as $cssFileName) {
                        echo "<link href='css/".$cssFileName.".css' type='text/css' rel='stylesheet'>";
                    } ?>
            </head>
            <body>
                <?php
                    // load content header file
                    echo $this->header->getViewHtml(); ?>
        
                <section class="main container-fluid">
                <?php
                    // load content view file
                    echo $this->contentHtml; ?>
                </section>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <!-- using JQuery instead of JQuery mini otherwise we can't make ajax call -->
                <script src="js/jquery-3.3.1.min.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <?php
                    $jsFiles=array_merge($this->view->getJsFiles(), $this->header->getJsFiles());
                    
                    foreach ($jsFiles as $jsFileName) {
                        echo "<script src='js/".$jsFileName.".js'></script>";
                    } ?>
            </body>
        </html>
		<?php
    }
}

$renderer= new Index();

$renderer->render();
