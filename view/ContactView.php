<?php
class ContactView extends AbstractView
{
    
    public $msg = "";

    public function __construct($args){
        parent::__construct($args);
    }
    
    public function setMsg($msg) {
        $this->msg = $msg;
        //die($this->msg);
    } 

    public function getHtml()
    {
        ?> 
        <?php
            if($this->msg!="") {
                echo '<div class="errorMessage">'.$this->msg.'</div>';
            } else {
                echo '<div class="errorMessage">Pas de message</div>';
            }
            
        ?>
        <form class="form-inline my-2 my-lg-0" id="loginForm" action="index.php" method="POST">
            <input type="hidden" name="page" value="AddContact" />
            <input class="form-control form-control-sm mr-sm-2" type="text" name="title" placeholder="Titre de la question" aria-label="question"/>
            <input class="form-control form-control-sm mr-sm-2" type="type" name="content" placeholder="Contenu de la question" />
            <button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" value="Poser">Poser la question</button>
        </form>
    <?php
    }
}
