<?php
class MultipleChoiceAnswersModel{

	private static $currentMultipleChoice;
	
	/**
	 * Get multiple all the answers of a specific question of the Multiple Choice system
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  [int]   $MultipleChoiceQuestionId id of the question of Multiple Choice Exercice
	 * @return [array]            list of all mutliple choice exercices
	 */
	public static function getMultipleChoiceAnswersList($MultipleChoiceQuestionId){
        
		$bdd = Database::getDb();

		$request = "SELECT *".
		  " FROM multiple_choice_answers".
		  " WHERE multiple_choice_questions_id = $MultipleChoiceQuestionId"; 

		$preparedRequest = $bdd->prepare($request); 
		$preparedRequest->execute(array('MultipleChoiceQuestionId'=>$MultipleChoiceQuestionId));
		$MultipleChoiceAnswersList=array();

		while($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){
		    
		    $answers = new MultipleChoiceAnswers($data);

		    $MultipleChoiceAnswersList[] = $answers;
		}

		return $MultipleChoiceAnswersList;

    }

}