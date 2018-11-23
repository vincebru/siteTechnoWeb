<?php 

class Get {
    public function execute() {
    	$data = $_POST;
    	$results = array();
        $comments = GlobalModel::getAll(Contact::class, ' where main.element_id = '.$data['id'].' and main.user_id = ' . UserModel::getConnectedUser()->getId() . ' order by created ASC', null);
        foreach ($comments as $comment) {
        	$com = $comment->getValues();
        	$com["created"] = join(' at ',explode(' ',date_format(date_create($com["created"]), 'd/m/Y H:i')));
        	$results[] = $com;
        	$responses = GlobalModel::getAll(Contact::class, ' where main.parent_id = '.$comment->getValues()['contact_id'].' order by created ASC', null);
        	foreach ($responses as $response) {
        		$res = $response->getValues();
        		$res["created"] = join(' at ',explode(' ',date_format(date_create($res["created"]), 'd/m/Y H:i')));
        		$res["user_id"] = UserModel::getUserFromId($res["user_id"])->getLogin();
        		$results[] = $res;
        	}
        }
        echo(json_encode($results));
    }
    
}
