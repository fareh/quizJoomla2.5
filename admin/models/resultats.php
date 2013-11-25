<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * QuizList Model
 */
class QuizModelResultats extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		/*// Select some fields
		$query->select('id,result,id_user');
		// From the hello table
		$query->from('#__quiz_result');*/
		
		$query->select('u.id, u.result, u.id_user, a.name');
        $query->from('#__quiz_result AS u');
        $query->leftJoin('#__quiz_name AS a ON a.id = u.id_user');
		
		return $query;
	}
}
