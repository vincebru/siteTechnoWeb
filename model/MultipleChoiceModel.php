<?php
class MultipleChoiceModel{

	private static $currentMultipleChoice;
	
	/**
	 * Get multiple choice list from a lesson_id or not
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  [int]   $lesson_id id of the lesson from the element table (= False if you do not want to filter your request)
	 * @param  [str]   $orderBy   ASC ou DESC
	 * @return [array]            list of all mutliple choice exercices
	 */
	public static function getMultipleChoiceList($lesson_id, $orderBy){
        
		$bdd = Database::getDb();

		$request = "select * from multiple_choice".
		  ($lesson_id!=false?" where lesson_id = $lesson_id ":"").
		  " order by ".$orderBy;

		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('lesson_id'=>$lesson_id));
		$MultipleChoiceList=array();

		while($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
		    $multipleChoice = new MultipleChoice($data);
		    $MultipleChoiceList[] = $multipleChoice;
		}

		return $MultipleChoiceList;

    }

    /**
     * Get the Multiple Choice from an id
     * 
     * @author Grégoire Gaonach
     * 
     * @param  int $id the id of the multiple choice exercice
     * @return array     the data of a multiple choice exercice
     */
	public static function getMultipleChoiceFromId($id) {

		$bdd = Database::getDb();

		$request = "SELECT multiple_choice.*, element.content as lessonName"
			." FROM multiple_choice"
			." JOIN element ON (multiple_choice.lesson_id = element.element_id)"
			." WHERE multiple_choice.element_id = :id";

		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('id'=>$id));
		
		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return new MultipleChoice($data);
		}

		return "";
	}

	/**
	 * Check if the Multiple Choice Exercice as been already answered or not by the user
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  int $id 		 id of the Mutliple Choice Exercice
	 * @param  int $user_id  user id
	 * @return bool 	     true if already answered
	 */
	public static function answered($id, $user_id){

		$bdd = Database::getDb();

		// SELECT COUNT(*) FROM multiple_choice_questions JOIN multiple_choice_users ON (multiple_choice_questions.element_id = multiple_choice_users.answer_id) WHERE multiple_choice_users.user_id = 1 AND multiple_choice_questions.multiple_choice_id = 1

		$request = "SELECT COUNT(*)"
			." FROM multiple_choice_questions"
			." JOIN multiple_choice_users"
			." ON (multiple_choice_questions.element_id = multiple_choice_users.answer_id)"
			." WHERE multiple_choice_users.user_id = :user_id AND multiple_choice_questions.multiple_choice_id = :id";

		$preparedRequest = $bdd->prepare($request);
		$preparedRequest->execute(array('id' => $id, 'user_id' => $user_id));
		
		if($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
			return $data['COUNT(*)'] > 0;
		}

		return False;

	}

}