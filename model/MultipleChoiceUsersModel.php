<?php
class MultipleChoiceUsersModel{

	/**
	 * Add a new answer from a specific user for a specific answer
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param int $user_id   user id
	 * @param int $answer_id answer id
	 */
	public static function addAnswers($user_id, $answer_id){

		$bdd = Database::getDb();	

		$req = $bdd->prepare(
			'insert into multiple_choice_users (user_id, answer_id) 
				values (:user_id, :answer_id)');

	 	$req->execute(array(
				'user_id'   => $user_id,
				'answer_id' => $answer_id
			));

	}

	/**
	 * Get the results of a multiple choice exercice for a specific user
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  int $user_id            user id
	 * @param  int $multiple_choice_id multiple choice exercice id
	 * @return float                   pourcentage of good answers
	 */
	public static function getResults($user_id, $multiple_choice_id){
		
		# 1. Get all the questions of the multiple choice exercice
		$questions = MultipleChoiceQuestionsModel::getMultipleChoiceQuestionsList($multiple_choice_id);

		# 2. Start the good answers counter
		$good_answers = 0;
		
		# 3. Checking the result on every question
		foreach ($questions as $q):

			$result = true; # It is assumed that the user is right
			
			foreach ($q->getAnswers() as $a) {
				if($a->getResult() != MultipleChoiceUsersModel::getUserAnswer($user_id, $a->getId())){
					$result = false;
				}
			}

			if($result == true){
				$good_answers++;
			}

		endforeach;

		return $good_answers/count($questions);

	}

	/**
	 * Get some stats of a multiple_choice_id form
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  int $multiple_choice_id multiple choice exercice id
	 * @return float                   pourcentage of good answers
	 */
	public static function getStatistics($multiple_choice_id){
		
		# 1. Get all the questions of the multiple choice exercice
		$questions = MultipleChoiceQuestionsModel::getMultipleChoiceQuestionsList($multiple_choice_id);

		# 2. Get the number of participants
		$participants = MultipleChoiceUsersModel::getParticipants($multiple_choice_id);

		# 2. Checking the result on every question
		foreach ($questions as $q):
			
			foreach ($q->getAnswers() as $a) {
				
				$users_answers = MultipleChoiceUsersModel::getUsersAnswers($a->getId());

				$a->setStats(floatval($users_answers/$participants));

			}

		endforeach;

		return $questions;

	}

	/**
	 * Check if the user answered a specific question
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  int $user_id    user id
	 * @param  int $answer_id  multiple choice exercice id
	 * @return bool            if the user answered the quesiton
	 */
	public static function getUserAnswer($user_id, $answer_id){

		$bdd = Database::getDb(); 

		$request = "SELECT *"
			." FROM multiple_choice_users"
			." WHERE user_id = :user_id AND answer_id = :answer_id";

		$preparedRequest = $bdd->prepare($request); 
		$preparedRequest->execute(array('user_id' => $user_id, 'answer_id' => $answer_id)); 

		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return true;
		}

		return false;

	}

	/**
	 * Check all the answers of all the users for statistics
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  int $answer_id  multiple choice exercice id
	 * @return int             number of users that answered the question
	 */
	public static function getUsersAnswers($answer_id){

		$bdd = Database::getDb(); 

		$request = "SELECT COUNT(*)"
			." FROM multiple_choice_users"
			." WHERE answer_id = :answer_id";

		$preparedRequest = $bdd->prepare($request); 
		$preparedRequest->execute(array('answer_id' => $answer_id)); 

		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return $data["COUNT(*)"];
		}

		return 0;
	}

	/**
	 * Get the number of participants for a Multiple Choice Exercice
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  int $multiple_choice_id the id of the multiple choice exercice
	 * @return int                     the number of participants
	 */
	public static function getParticipants($multiple_choice_id){

		$bdd = Database::getDb(); 

		$request = "SELECT COUNT(DISTINCT multiple_choice_users.user_id) "
			." FROM multiple_choice_users"
			." JOIN multiple_choice_questions ON (multiple_choice_users.answer_id = multiple_choice_questions.element_id)"
			." WHERE multiple_choice_questions.multiple_choice_id = :multiple_choice_id";

		$preparedRequest = $bdd->prepare($request); 
		$preparedRequest->execute(array('multiple_choice_id' => $multiple_choice_id)); 

		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return $data['COUNT(DISTINCT multiple_choice_users.user_id)'];
		}

		return 0;

	}

}