<?php 

class Get {
    public function execute() {
    	$data = $_POST;
    	$results = array();
        $comments = GlobalModel::getAll(Contact::class, ' where main.element_id = '.$data['id'].' and main.user_id = ' . UserModel::getConnectedUser()->getId() . ' order by created ASC', null);
        foreach ($comments as $comment) {
        	$results[] = $comment->getValues();
        }
        echo(json_encode($results));
    }
    
}
