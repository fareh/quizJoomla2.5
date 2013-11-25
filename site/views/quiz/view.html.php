<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 */
class QuizViewQuiz extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
		// Assign data to the view
		$this->msg = $this->get('Msg');
 
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Display the view
		parent::display($tpl);
	}
	
	function ListeCritere($critere,$db){
			$query = $db->getQuery(true);
					$query_critere = "
					SELECT *
					FROM ".$db->nameQuote('#__critere')."
					WHERE ".$db->nameQuote('id')." = ".$db->quote($critere).";
					";
					$db->setQuery((string)$query_critere);
					$critere_list = $db->loadObjectList();	
					return $critere_list;
	}
	
	function ListeQuestion($critere,$db){
				$query_question = "
					SELECT *
					FROM ".$db->nameQuote('#__question')."
					WHERE ".$db->nameQuote('id_critere')." = ".$db->quote($critere).";
					";
					$db->setQuery((string)$query_question);
					$question_list = $db->loadObjectList();
					return $question_list;
	}
	
	function ListeReponse($question,$db){
				$query_reponse = "
			SELECT *
			FROM ".$db->nameQuote('#__reponse')."
			WHERE ".$db->nameQuote('id_question')." = ".$db->quote($question).";
			";
			$db->setQuery((string)$query_reponse);
			$reponse_list = $db->loadObjectList();	
			return $reponse_list;
	}
	
}
