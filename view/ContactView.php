<?php
class ContactView extends AbstractView
{
    
    protected $msg = '';
    protected $insertedContact;
    protected $missingProps;

    public function __construct($args){
        parent::__construct($args);
        $this->cssFiles['admin'] = 'ContactView';
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

    protected function displayMsg() {
        if($this->msg!='') {
            return '<div class="errorMessage">'.$this->msg.'</div>';
        }
    }

    protected function displayMissingProps() {
        $missingPropsStr = '';
        if(!empty($this->missingProps)) {
            $missingPropsStr = '<div id="missingProps">Missing fields :<br><script>';
            foreach ($this->missingProps as $value) {
                $missingPropsStr = $missingPropsStr . <<<EOF
                document.getElementsByName("$value")[0].style.borderColor = "red";
                document.getElementById("missingProps").innerHTML += "<li>"+document.getElementsByName("$value")[0].placeholder+"</li>";
EOF;
            }
            $missingPropsStr .= "</script></div>";
        }
        return $missingPropsStr;
    }

    public function getHtml()
    {
        if(!isset($this->args['view'])) {
            ?>
            <br>
            <button class="btn btn-sm btn-primary my-2 my-sm-0" onclick="$('#contactForm').slideToggle();">Show/Hide contact form</button>
            <br>
            <?=ContactFunctions::displayForm('none', 'inline', false)?>
            <?=$this->displayMsg()?>
            <?=$this->displayMissingProps()?>
            <?php ContactFunctions::displayContact($this->insertedContact, 'ContactLink')?>
            <br>
            <h3>Public contacts</h3>
            <table class="table table-hover table-sm">
                <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Posted by</th>
                            <th scope="col">Date</th>
                        </tr>
                </thead>
                <tbody>
            <?php
                $contacts = GlobalModel::getAll(Contact::class, ' where main.visibility = 0 and main.parent_id = -1 order by created DESC',null);
                foreach ($contacts as $value) {
                    ContactFunctions::displayContact($value, 'ContactLink');
                }
            ?>
            </tbody>
            </table>
        <?php
            if(UserModel::isConnected()) {
                $currentUserContact = GlobalModel::getAll(Contact::class, ' where main.visibility <> 2 and main.user_id = '. UserModel::getConnectedUser()->getId() .' and main.parent_id = -1 order by created DESC',null);
                if(count($currentUserContact) > 0) {
                    ?>
                    <br>
                    <h3>My contacts</h3>
                    <table class="table table-hover table-sm">
                        <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Posted by</th>
                                    <th scope="col">Date</th>
                                </tr>
                        </thead>
                        <tbody>
                    <?php
                    foreach ($currentUserContact as $value) {
                        ContactFunctions::displayContact($value, 'ContactLink');
                    }
                    ?>
                    </tbody>
                    </table>
                    <?php              
                }
                $currentUserNotes = GlobalModel::getAll(Contact::class, ' where main.visibility = 2 and main.user_id = '. UserModel::getConnectedUser()->getId() .' and main.parent_id = -1 order by created DESC',null);
                if(count($currentUserNotes) > 0) {
                    ?>
                    <br>
                    <h3>My notes</h3>
                    <table class="table table-hover table-sm">
                        <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Posted by</th>
                                    <th scope="col">Date</th>
                                </tr>
                        </thead>
                        <tbody>
                    <?php
                    foreach ($currentUserNotes as $value) {
                        ContactFunctions::displayContact($value, 'ContactLink');
                    }
                    ?>
                    </tbody>
                    </table>
                    <?php              
                }
            }
        } else {
            $id = $this->args['view'];
            ContactFunctions::displayContactDetail(GlobalModel::getInstance('Contact', $id), 'ContactLink');
            echo $this->displayMsg();
            echo $this->displayMissingProps();
        }
    }
}
