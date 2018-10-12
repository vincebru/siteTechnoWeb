<?php
class ContactView extends AbstractView
{
    
    protected $msg = "";
    protected $insertedContact;
    protected $missingProps;

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

    public function setMissingProps($array) {
        $this->missingProps = $array;
    }

    protected function formatMsg() {
        if($this->msg!="") {
            return '<div class="errorMessage" style="margin-top: 15px;">'.$this->msg.'</div>';
        }
    }

    protected function formatInsertedContact() {
        $insertedContactStr = "";
        if(isset($this->insertedContact)) {
            $values = $this->insertedContact->getValues();
            $title = $values["title"];
            $content = $values["content"];
            $username = UserModel::getUserFromId($values['user_id'])->getLogin();
            $mail = UserModel::getUserFromId($values['user_id'])->getEmail();
            $insertedContactStr = <<<EOF
            <div style="border: 1px solid lightgray;border-radius: 5px;padding: 5px;box-shadow: 6px 10px 10px -5px;">
                <h4>$title</h4>
                <p>$content</p>
                <br>
                <p style="margin: 0;font-size: 10px;">Asked by <a href="mailto:$mail" title="$mail">$username</a></p>
            </div>
EOF;
        }
        return $insertedContactStr;
    }

    protected function formatMissingProps() {
        $missingPropsStr = "";
        if(!empty($this->missingProps)) {
            $missingPropsStr = "<div id='missingProps'>Missing fields :<br><script>";
            foreach ($this->missingProps as $value) {
                $missingPropsStr = $missingPropsStr . <<<EOF
                document.getElementsByName("$value")[0].style.borderColor = "red";
                document.getElementById("missingProps").innerHTML += "<li style='list-style:inside;'>"+document.getElementsByName("$value")[0].placeholder+"</li>";
EOF;
            }
            $missingPropsStr .= "</script></div>";
        }
        return $missingPropsStr;
    }

    public function getHtml()
    {
        ?>
        <br>
        <button class="btn btn-sm btn-primary my-2 my-sm-0" onclick="$('#contactForm').slideToggle();">Show/Hide contact form</button>
        <br>
        <div id="contactForm" style="display: none;">
        <form class="" id="loginForm" action="index.php" style="margin-top: 15px;margin-bottom: 15px;" method="POST">
            <input type="hidden" name="page" value="AddContact" />
            <input class="form-control form-control-sm mr-sm-2" type="text" name="title" placeholder="Title of the question" aria-label="question"/><br>
            <textarea class="form-control form-control-sm mr-sm-2" type="type" name="content" placeholder="Detail of the question"></textarea><br>
            <button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" value="Ask">Ask a question</button>
        </form>
        </div>
        <?=$this->formatMsg()?>
        <?=$this->formatMissingProps()?>
        <?=$this->formatInsertedContact()?>
        <hr>
        <!--Contacts here -->
    <?php
    }
}
