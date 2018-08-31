<?php

class IndexView {

    protected $jsFiles;
    protected $cssFiles;
    protected $headerHtml;
    protected $contentHtml;

	function __construct($args){
        $this->jsFiles = $args['jsFiles'];
        $this->cssFiles = $args['cssFiles'];
        $this->headerHtml = $args['headerHtml'];
        $this->contentHtml = $args['contentHtml'];
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
            foreach($this->cssFiles as $cssFileName){
                echo "<link href='css/".$cssFileName.".css' type='text/css' rel='stylesheet'>";
            }
        ?>
    </head>
    <body>
        <?php
            // load content header file
            echo $this->headerHtml;
        ?>

        <section class="main container-fluid">
        <?php
            // load content view file
            echo $this->contentHtml;
        ?>
        </section>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- using JQuery instead of JQuery mini otherwise we can't make ajax call -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php 
            foreach($this->jsFiles as $jsFileName){
                echo "<script src='js/".$jsFileName.".js'></script>";
            }
        ?>
    </body>
</html>
<?php
    }
}