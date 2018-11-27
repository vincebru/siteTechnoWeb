<?php
class MultipleChoiceQuestionsModel{

	private static $currentMultipleChoice;
	
	/**
	 * Get multiple all the questions and answers from a MultipleChoice Exercice
	 * 
	 * @author Grégoire Gaonach
	 * 
	 * @param  [int]   $MultipleChoiceId id of the Multiple Choice Exercice
	 * @return [array]            list of all mutliple choice exercices
	 */
	public static function getMultipleChoiceQuestionsList($MultipleChoiceId){
        
		$bdd = Database::getDb();

		$request = "SELECT *".
		  " FROM multiple_choice_questions".
		  " WHERE multiple_choice_id = $MultipleChoiceId";

		$preparedRequest = $bdd->prepare($request); 
		$preparedRequest->execute(array('MultipleChoiceId'=>$MultipleChoiceId));
		$MultipleChoiceQuestionsList=array();

		while($data = $preparedRequest->fetch(PDO::FETCH_ASSOC)){

			$data['answers'] = MultipleChoiceAnswersModel::getMultipleChoiceAnswersList($data['element_id']);

		    $questions = new MultipleChoiceQuestions($data);

		    $MultipleChoiceQuestionsList[] = $questions;
		}

		return $MultipleChoiceQuestionsList;

    }

}