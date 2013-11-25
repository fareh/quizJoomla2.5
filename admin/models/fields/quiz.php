<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Quiz Form Field class for the Quiz component
 */
class JFormFieldQuiz extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Quiz';
 
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		/*$query->select('id,content,id_critere');
		$query->from('#__question');*/
		
		
		/*$query->select('#__question.id as id,content,#__critere.title as content,id_critere');
		$query->from('#__question');
		$query->leftJoin('#__critere on id_critere=#__critere.id');
		*/
		$query->select('u.id, u.content, u.id_critere, a.title');
        $query->from('#__question AS u');
        $query->leftJoin('#__critere AS a ON a.id = u.id_critere');	
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		print_r($messages); exit ;
		$options = array();
		if ($messages)
		{
			foreach($messages as $message) 
			{
				$options[] = JHtml::_('select.option', $message->id, $message->content,  $message->title );
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
