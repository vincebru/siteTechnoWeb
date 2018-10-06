<?php
class ContactView extends AbstractView
{
    
    protected $msg = "";
    protected $insertedContact;

    public function __construct($args){
        parent::__construct($args);
    }
    
    public function setMsg($msg) {
        $this->msg = $msg;
        //die($this->msg);
    } 

    public function setInsertedContact($insertedContact) {
        $this->insertedContact = $insertedContact;
    }

    public function getHtml()
    {
        ?> 
        <?php
            if($this->msg!="") {
                echo '<div class="errorMessage" style="margin-top: 15px;margin-bottom: 15px;">'.$this->msg.'</div>';
            }
            
        ?>
        <?php
            if(isset($this->insertedContact)) {
                $values = $this->insertedContact->getValues();
                $title = $values["title"];
                $content = $values["content"];
                $username = UserModel::getUserFromId($values['user_id'])->getLogin();
                echo <<<EOF
                    <div style="border: 1px solid lightgray;border-radius: 5px;margin-bottom: 15px;padding: 5px;box-shadow: 6px 10px 10px -5px;">
                        <h4>$title</h4>
                        <p>$content</p>
                        <br>
                        <p style="margin: 0;font-size: 10px;">Posé par $username</p>
                    </div>
EOF;
            }
        ?>
        <form class="" id="loginForm" action="index.php" method="POST">
            <input type="hidden" name="page" value="AddContact" />
            <input class="form-control form-control-sm mr-sm-2" type="text" name="title" placeholder="Titre de la question" aria-label="question"/><br>
            <textarea class="form-control form-control-sm mr-sm-2" type="type" name="content" placeholder="Contenu de la question"></textarea><br>
            <button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" value="Poser">Poser la question</button>
        </form>
    <?php
    }
}
