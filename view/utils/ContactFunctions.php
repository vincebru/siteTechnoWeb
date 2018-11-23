<?php
class ContactFunctions {

    static function displayContact($contact, $page) {
        if($contact==null) return "";
        $values = $contact->getValues();
        $id = $contact->getId();
        $title = $values['title'];
        $date = join(' at ',explode(' ',date_format(date_create($values['created']), 'd/m/Y H:i')));
        $username = UserModel::getUserFromId($values['user_id'])->getLogin();
        $mail = UserModel::getUserFromId($values['user_id'])->getEmail();
        echo <<<EOF
        <tr>
            <td scope="row"><a href="?page=$page&view=$id">$title</a></td>
            <td><a href="mailto:$mail" title="$mail">$username</a></td>
            <td>$date</td>
        </tr>
EOF;
     }


    static public function displayForm($display, $displaySubmit, $allowNotes) {
        $note = '<input type="radio" name="visibility" value="2"/><label>Personal note</label><br>';
        if(!($allowNotes)) {
            $note = '';
        }
        return <<<EOF
        <div id="contactForm" style="display: $display;">
        <form id="addContactForm" class="" action="index.php" style="margin-top: 15px;margin-bottom: 15px;" method="POST">
            <input type="hidden" name="page" value="AddContact" />
            <input class="form-control form-control-sm mr-sm-2" type="text" name="title" placeholder="Title of the question" aria-label="question"/><br>
            <textarea class="form-control form-control-sm mr-sm-2" type="type" name="content" placeholder="Detail"></textarea><br>
            <input type="radio" name="visibility" value="0" checked/><label>Public</label><br>
            <input type="radio" name="visibility" value="1"/><label>Private (only visible by you and admin)</label><br>
            $note
            <input type="hidden" name="element_id" value="-1"/>
            <button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" style="display:$displaySubmit;" value="Ask">Ask a question</button>
        </form>
        </div>
EOF;
    }

	static function displayContactDetail($contact, $formPage) {
        echo <<<EOF
                <br>
                <a href="index.php?page=$formPage"><button class="btn btn-sm btn-primary my-2 my-sm-0">Retour</button></a>
                <br>
                <hr>
EOF;
		if($contact==null)  {
            echo '<span>Can\'t find this contact</span>';
            return;
        }
        $values = $contact->getValues();
        $id = $values['contact_id'];
        $formStr = <<<EOF
                <form class="" action="index.php?page=$formPage&view=$id" style="padding-left:15px;margin-top: 15px;margin-bottom: 15px;" method="POST">
                    <input type="hidden" name="page" value="AddContact" />
                    <input type="hidden" name="parent_id" value="$id" />
                    <input type="hidden" name="view" value="$id" />
                    <input type="hidden" name="title" value="Comment"/>
                    <textarea class="form-control form-control-sm mr-sm-2" type="type" name="content" placeholder="Comment"></textarea><br>
                    <button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" value="Ask">Comment</button>
                </form>
EOF;
        if($values['parent_id'] != -1) {
            echo '<span>Cannot display a comment</span>';
            return;
        } else if($values['visibility'] == 1 && UserModel::getConnectedUser()==null) { 
            echo '<span>You don\'t have right to see this contact</span>';
            return;
        } else if (UserModel::getConnectedUser()!=null) {
            if($values['visibility'] == 1 && $values['user_id']!=UserModel::getConnectedUser()->getId() && UserModel::getConnectedUser()->getRole() != 1) {
                echo '<span>You don\'t have right to see this contact</span>';
                return;
            }
        } else {
            $formStr = '';
        }
        $title = $values['title'];
        $content = $values['content'];
        $id = $contact->getId();
        $date = join(' at ',explode(' ',date_format(date_create($values['created']), 'd/m/Y H:i')));
        $username = UserModel::getUserFromId($values['user_id'])->getLogin();
        $mail = UserModel::getUserFromId($values['user_id'])->getEmail();
        $elementLink = '';
        if($values['element_id'] != '-1') {
            $element = GlobalModel::getElement($values['element_id']);
            $elementLink = '<br>Question about <a href="?page=MenuLink&id='.$element->getParentId().'#page-'. $element->getId() . '">' . $element->getContent() . '</a>';  
        }

		echo <<<EOF
            <h3 id="title" contenteditable style="text-decoration: underline;">$title<button class="btn btn-sm btn-primary my-2 my-sm-0" id="edit">Edit title/message</button></h3>
            <span id="content" contenteditable>$content</span>
            <br>
            <span style='font-size:10px;'>by <a href="mailto:$mail" title="$mail">$username</a> the $date</span>
            $elementLink
            <hr>
            <script>
                document.getElementById('edit').onclick = click;

                function click() {
                    
                }
            </script>
EOF;

        $comments = GlobalModel::getAll(Contact::class, ' where main.parent_id = '.$id.' order by created ASC', null);
        foreach ($comments as $value) {
            $value = $value->getValues();
            $c_content = $value['content'];
            $c_date = join(' at ',explode(" ",date_format(date_create($value['created']), 'd/m/Y H:i')));
            $c_username = UserModel::getUserFromId($value['user_id'])->getLogin();
            $c_mail = UserModel::getUserFromId($value['user_id'])->getEmail();
            echo <<<EOF
            <div style="padding-left:15px;">
                <span>$c_content</span>
                <br>
                <span style='font-size:10px;'>by <a href="mailto:$c_mail" title="$c_mail">$c_username</a> the $c_date</span>
                <hr>
            </div>
EOF;
        }
        echo $formStr;     
	}
}