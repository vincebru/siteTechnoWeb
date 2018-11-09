<?php 

class AdminContactView extends AbstractAdminView {
    public function __construct($args)
    {
        parent::__construct($args);
        $this->jsFiles['adminUser'] = 'adminUser';
        $this->isGrouped=false;
        if(isset($args['isGrouped'])){
            $this->isGrouped=true;
        }
    }

    public function getHtml() {
        if(!isset($this->args['view'])) {
            ?>
            <h2>Public Contacts</h2>
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
            $contacts = GlobalModel::getAll(Contact::class, ' where main.parent_id = -1 and main.visibility = 0', null);
            foreach ($contacts as $value) {
                ContactFunctions::displayContact($value, 'AdminContactLink');
    	    }   
            ?>
            </tbody>
            </table>
            <h2>Private Contacts</h2>
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
            $contacts = GlobalModel::getAll(Contact::class, ' where main.parent_id = -1 and main.visibility = 1', null);
            foreach ($contacts as $value) {
                ContactFunctions::displayContact($value, 'AdminContactLink');
            }   
            ?>
            </tbody>
            </table>
            <h2>Personnal Notes</h2>
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
            $contacts = GlobalModel::getAll(Contact::class, ' where main.parent_id = -1 and main.visibility = 2', null);
            foreach ($contacts as $value) {
                ContactFunctions::displayContact($value, 'AdminContactLink');
            }   
            ?>
            </tbody>
            </table>
            <?php
        } else {
            $id = $this->args['view'];
            ContactFunctions::displayContactDetail(GlobalModel::getInstance('Contact', $id), 'AdminContactLink');
        }
   	}
}